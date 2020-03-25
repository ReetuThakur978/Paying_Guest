<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Pgdetail extends Entity
{
    
    protected $_accessible = [
        'owner_id' => true,
        'room' => true,
        'location' => true,
        'address' => true,
        'area' => true,
        'which_gender' => true,
        'availability' => true,
        'no_of_room' => true,
        'status' => true,
        'created' => true,
        'updated' => true,
        'phone' => true,
        'user' => true,
    ];
}
