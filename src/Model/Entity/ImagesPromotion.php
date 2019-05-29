<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ImagesPromotion Entity
 *
 * @property int $image_id
 * @property int $promotion_id
 *
 * @property \App\Model\Entity\Image $image
 * @property \App\Model\Entity\Promotion $promotion
 */
class ImagesPromotion extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'image' => true,
        'promotion' => true
    ];
}
