<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SalesItem Entity
 *
 * @property int $id
 * @property int $sale_id
 * @property int $fruit_id
 * @property int $quantity
 * @property string $price
 * @property int|null $discount
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Fruit $fruit
 */
class SalesItem extends Entity
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
        'sale_id' => true,
        'fruit_id' => true,
        'quantity' => true,
        'price' => true,
        'discount' => true,
        'created' => true,
        'modified' => true,
        'sale' => true,
        'fruit' => true,
    ];
}
