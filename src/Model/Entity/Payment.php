<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


class Payment extends Entity
{
    
    protected $_accessible = [
        'transientuser_id' => true,
        'pgowner_id' => true,
        'amount' => true,
        'payment_mode' => true,
        'transaction_id' => true,
        'created' => true,
        // 'user' => true,
        'transaction' => true,
    ];
}
