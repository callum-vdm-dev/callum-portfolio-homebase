<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class ContentComponent extends Component
{
    /**
     * Prepare contents array from a collection
     *
     * @param \Cake\Collection\CollectionInterface|\ArrayObject|array $collection
     * @return array
     */
    public function prepareContents($collection): array
    {
        $contents = [];
        foreach ($collection as $item) {
            $contents[$item->title] = $item->content;
        }
        return $contents;
    }
}
