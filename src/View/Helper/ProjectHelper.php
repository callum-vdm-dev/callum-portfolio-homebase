<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Utility\Text;

class ProjectHelper extends Helper {

    /**
     * Extracts and returns the text after the first <h1> or <h2> element,
     * and then truncates it to a specified character limit.
     *
     * @param string $html The HTML content from which to extract the summary.
     * @param int $limit The maximum number of characters allowed (default 150).
     * @return string The extracted and truncated summary text.
     */
    public function extractSummaryAfterHeading($html, $limit = 200) {
        //Split the HTML on the first <h1> or <h2> tag.
        $parts = preg_split('#<h[12][^>]*>.*?</h[12]>#is', $html);

        // If there's content after the heading, use it.
        if (count($parts) > 1) {
            $summary = trim(strip_tags($parts[1]));
        } else {
            //If no heading is found, fallback to the full text.
            $summary = trim(strip_tags($html));
        }

        //Use CakePHP's Text utility to truncate the summary to the limit.
        if (mb_strlen($summary) > $limit) {
            $summary = Text::truncate($summary, $limit, ['ellipsis' => '...', 'exact' => false]);
        }

        return $summary;
    }

    /**
     * Extracts and returns the text after the first <h1> or <h2> element,
     * and then splits it into two distinct lines of 50 characters each.
     *
     * @param string $html The HTML content from which to extract the teaser.
     * @return array An array with two elements: line1 and line2 (can be empty if not enough content).
     */
    public function extractTwoLineTeaser($html) {
        // Strip out the first <h1> or <h2>
        $parts = preg_split('#<h[12][^>]*>.*?</h[12]>#is', $html);

        // Get content after heading, or fallback
        $clean = count($parts) > 1 ? trim(strip_tags($parts[1])) : trim(strip_tags($html));

        // Remove any remaining whitespace artifacts
        $clean = preg_replace('/\s+/', ' ', $clean);

        // Grab the first 100 characters
        $teaser = Text::truncate($clean, 120, ['ellipsis' => '', 'exact' => false]);

        // Split into two 50-character chunks
        $line1 = Text::truncate($teaser, 60, ['ellipsis' => '', 'exact' => false]);
        $line2 = trim(mb_substr($teaser, mb_strlen($line1)));
        if($line2){
            $line2 = $line2 . '...';
        }

        return [$line1, $line2];
    }


}
