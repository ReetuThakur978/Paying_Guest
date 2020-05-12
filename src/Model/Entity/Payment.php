<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Payment extends Entity
{
   
    protected $_accessible = [
        'transientuser_id' => true,
        
        'amount' => true,
        'payment_mode' => true,
        // 'transaction_id' => true,
        'created' => true,
        'booking_id' => true,
        // 'user' => true,
        // 'transaction' => true,
    ];
}
