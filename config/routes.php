<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
 * So you can use `$this` to reference the application class instance
 * if required.
 */
return function (RouteBuilder $routes): void {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');



        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * It is NOT recommended to use fallback routes after your initial prototyping phase!
         * See https://book.cakephp.org/5/en/development/routing.html#fallbacks-method for more information
         */
        $builder->fallbacks();
    });

    $routes->connect('/blog/{slug}',
        ['controller' => 'Posts', 'action' => 'publicView']
    )
        ->setPatterns(['slug' => '[a-z0-9\-]+'])
        ->setPass(['slug']);

    $routes->connect('/blog', ['controller' => 'Posts', 'action' => 'publicList']);

    $routes->connect('/projects/{slug}',
        ['controller' => 'Projects', 'action' => 'publicView']
    )
        ->setPatterns(['slug' => '[a-z0-9\-]+'])
        ->setPass(['slug']);
    $routes->connect('/projects', ['controller' => 'Projects', 'action' => 'publicList']);

    //Explicit routing. Change to prefix routing if you want more scalability. This works for small systems.
    $routes->connect('/admin', ['controller' => 'Users', 'action' => 'dashboard']);
    $routes->connect('/admin/projects', ['controller' => 'Projects', 'action' => 'index']);
    $routes->connect('/admin/projects/add', ['controller' => 'Projects', 'action' => 'add']);
    $routes->connect('/admin/projects/edit/*', ['controller' => 'Projects', 'action' => 'edit']);
    $routes->connect('/admin/projects/view/*', ['controller' => 'Projects', 'action' => 'view']);

    $routes->connect('/admin/posts', ['controller' => 'Posts', 'action' => 'index']);
    $routes->connect('/admin/posts/add', ['controller' => 'Posts', 'action' => 'add']);
    $routes->connect('/admin/posts/edit/*', ['controller' => 'Posts', 'action' => 'edit']);
    $routes->connect('/admin/posts/view/*', ['controller' => 'Posts', 'action' => 'view']);

    $routes->connect('/admin/contents', ['controller' => 'Contents', 'action' => 'index']);
    $routes->connect('/admin/contents/view/*', ['controller' => 'Contents', 'action' => 'view']);
    $routes->connect('/admin/contents/edit/*', ['controller' => 'Contents', 'action' => 'edit']);

    $routes->connect('/admin/users', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/admin/users/add', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/admin/users/edit/*', ['controller' => 'Users', 'action' => 'edit']);
    $routes->connect('/admin/users/view/*', ['controller' => 'Users', 'action' => 'view']);

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
