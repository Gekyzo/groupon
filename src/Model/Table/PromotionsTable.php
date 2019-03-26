<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotions Model
 *
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\Promotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PromotionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('promotions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Orders', [
            'foreignKey' => 'promotion_id'
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'promotion_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'categories_promotions'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 512)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('slug')
            ->maxLength('slug', 512)
            ->requirePresence('slug', 'create')
            ->allowEmptyString('slug', false);

        $validator
            ->numeric('price_old')
            ->requirePresence('price_old', 'create')
            ->allowEmptyString('price_old', false);

        $validator
            ->numeric('price_new')
            ->requirePresence('price_new', 'create')
            ->allowEmptyString('price_new', false);

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->allowEmptyString('body', false);

        $validator
            ->dateTime('available_since')
            ->allowEmptyDateTime('available_since');

        $validator
            ->dateTime('available_until')
            ->allowEmptyDateTime('available_until');

        return $validator;
    }
}
