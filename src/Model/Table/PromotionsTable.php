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
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsToMany $Images
 *
 * @method \App\Model\Entity\Promotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
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
        $this->belongsToMany('Images', [
            'foreignKey' => 'promotion_id',
            'targetForeignKey' => 'image_id',
            'joinTable' => 'images_promotions'
        ]);

        $this->addBehavior('Muffin/Trash.Trash');
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
            ->numeric('price_old')
            ->requirePresence('price_old', 'create')
            ->allowEmptyString('price_old', false);

        $validator
            ->numeric('price_new')
            ->requirePresence('price_new', 'create')
            ->allowEmptyString('price_new', false);

        $validator
            ->scalar('state')
            ->maxLength('state', 24)
            ->allowEmptyString('state');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->allowEmptyString('body', false);

        $validator
            ->dateTime('available_since')
            ->requirePresence('available_since', 'create')
            ->allowEmptyDateTime('available_since', false);

        $validator
            ->dateTime('available_until')
            ->requirePresence('available_until', 'create')
            ->allowEmptyDateTime('available_until', false);

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }
}
