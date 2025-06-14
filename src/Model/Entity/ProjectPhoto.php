<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectPhoto Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $caption
 * @property string $path
 * @property \Cake\I18n\DateTime $created
 * @property int $project_id
 * @property int $sort_order
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectPhoto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'title' => true,
        'caption' => true,
        'path' => true,
        'created' => true,
        'project_id' => true,
        'sort_order' => true,
        'project' => true,
    ];
}
