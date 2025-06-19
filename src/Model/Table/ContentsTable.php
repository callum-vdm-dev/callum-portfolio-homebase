<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contents Model
 *
 * @method \App\Model\Entity\Content newEmptyEntity()
 * @method \App\Model\Entity\Content newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Content> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Content get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Content findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Content patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Content> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Content|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Content saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Content>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Content> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('contents');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('content')
            ->allowEmptyString('content');

        return $validator;
    }
}
