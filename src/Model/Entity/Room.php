<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Room Entity
 *
 * @property int $room_id
 * @property int $pg_id
 * @property string $ac_noac
 * @property string $seater
 * @property int $rent
 * @property string|null $image
 * @property string $with_or_without_food
 * @property int $security_charge
 * @property int $notic_period
 * @property int $seates_available
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\Pgdetail $pgdetail
 */
class Room extends Entity
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
        'pg_id' => true,
        'ac_noac' => true,
        'seater' => true,
        'rent' => true,
        'image' => true,
        'with_or_without_food' => true,
        'security_charge' => true,
        'notic_period' => true,
        'seates_available' => true,
        'status' => true,
        'created' => true,
        'updated' => true,
        'pgdetail' => true,
    ];
}
