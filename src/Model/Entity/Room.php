<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Room extends Entity
{
    
    protected $_accessible = [
        'pg_id' => true,
        'ac' => true,
        'seater' => true,
        'rent' => true,
        'image' => true,
        'food_availability' => true,
        'security_charge' => true,
        'notic_period' => true,
        'seates_available' => true,
        'status' => true,
        'created' => true,
        'updated' => true,
        'pgdetail' => true,
    ];
}
