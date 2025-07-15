<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\ORM\TableRegistry;
use Cake\View\Cell;

/**
 * FooterLinks cell
 */
class FooterLinksCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array<string, mixed>
     */
    protected array $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $contentsTable = TableRegistry::getTableLocator()->get('Contents');

        // Fetch contents by slug 'footer' or whatever you use
        $footerContentsRaw = $contentsTable->find()
            ->where(['slug' => 'footer'])
            ->all();

        //cant load component in cell.
        $footerContents = [];
        foreach ($footerContentsRaw as $item) {
            $footerContents[$item->title] = $item->content;
        }

        $this->set('footerContents', $footerContents);
    }
}
