<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Room extends Entity
{
    
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
