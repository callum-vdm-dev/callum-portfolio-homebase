<?php
namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Cake\Cache\Cache;

class RateLimitMiddleware implements MiddlewareInterface
{
    private int $limit = 100; // Max requests
    private int $window = 600; // Time window in seconds (10 minutes)

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $ip = $request->getServerParams()['REMOTE_ADDR'] ?? 'unknown';
        $cacheKey = 'rate_limit_' . $ip;

        $data = Cache::read($cacheKey) ?? ['count' => 0, 'expires' => time() + $this->window];

        if (time() > $data['expires']) {
            $data = ['count' => 0, 'expires' => time() + $this->window];
        }

        $data['count']++;

        if ($data['count'] > $this->limit) {
            $retryAfter = $data['expires'] - time();
            $response = new \Cake\Http\Response();
            return $response
                ->withStatus(429)
                ->withHeader('Retry-After', $retryAfter)
                ->withStringBody('Rate limit exceeded. Try again in ' . $retryAfter . ' seconds.');
        }

        // Use 'default' cache config and set TTL via options
        Cache::write($cacheKey, $data, 'default', ['ttl' => $this->window]);

        return $handler->handle($request);
    }
}
