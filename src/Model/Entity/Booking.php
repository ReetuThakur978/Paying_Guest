<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Booking extends Entity
{
    
    protected $_accessible = [
        'transient_id' => true,
        'days' => true,
        'personshift' => true,
        'requirement' => true,
        'created' => true,
        'user' => true,
    ];
}
