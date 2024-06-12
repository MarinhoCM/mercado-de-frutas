<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SalesItems Model
 *
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\BelongsTo $Sales
 * @property \App\Model\Table\FruitsTable&\Cake\ORM\Association\BelongsTo $Fruits
 *
 * @method \App\Model\Entity\SalesItem newEmptyEntity()
 * @method \App\Model\Entity\SalesItem newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SalesItem> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SalesItem get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SalesItem findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SalesItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SalesItem> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SalesItem|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SalesItem saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SalesItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SalesItem>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SalesItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SalesItem> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SalesItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SalesItem>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SalesItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SalesItem> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalesItemsTable extends Table
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

        $this->setTable('sales_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sales', [
            'foreignKey' => 'sale_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Fruits', [
            'foreignKey' => 'fruit_id',
            'joinType' => 'INNER',
        ]);
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
            ->integer('sale_id')
            ->notEmptyString('sale_id');

        $validator
            ->integer('fruit_id')
            ->notEmptyString('fruit_id');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('discount')
            ->allowEmptyString('discount');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['sale_id'], 'Sales'), ['errorField' => 'sale_id']);
        $rules->add($rules->existsIn(['fruit_id'], 'Fruits'), ['errorField' => 'fruit_id']);

        return $rules;
    }
}
