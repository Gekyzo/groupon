<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ImagesPromotions Model
 *
 * @property \App\Model\Table\ImagesTable|\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\PromotionsTable|\Cake\ORM\Association\BelongsTo $Promotions
 *
 * @method \App\Model\Entity\ImagesPromotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\ImagesPromotion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ImagesPromotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ImagesPromotion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ImagesPromotion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ImagesPromotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ImagesPromotion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ImagesPromotion findOrCreate($search, callable $callback = null, $options = [])
 */
class ImagesPromotionsTable extends Table
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

        $this->setTable('images_promotions');
        $this->setDisplayField('image_id');
        $this->setPrimaryKey(['image_id', 'promotion_id']);

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Promotions', [
            'foreignKey' => 'promotion_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['image_id'], 'Images'));
        $rules->add($rules->existsIn(['promotion_id'], 'Promotions'));

        return $rules;
    }
}
