<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $overview
 * @property string|null $github_url
 * @property string|null $live_url
 * @property string $status
 * @property \Cake\I18n\Date|null $start_date
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\ProjectPhoto[] $project_photos
 */
class Project extends Entity
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
        'slug' => true,
        'overview' => true,
        'github_url' => true,
        'live_url' => true,
        'status' => true,
        'start_date' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'user' => true,
        'posts' => true,
        'project_photos' => true,
    ];
}
