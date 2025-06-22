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
}
