<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title)?$title:""; ?></title>
</head>
<body>
<div class="row"> 
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu : ') ?></h4>

            <?= $this->Html->link(__('My PGs'), ['controller'=>'Pgowner','action' => 'mypg'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('All transient guest'), ['controller'=>'Pgowner','action' => 'transient'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Add new PG'), ['action' => ''], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Room available'), ['action' => ''], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    
     <div class="column-responsive column-80">
        <div class="users view content">
       <!--  <div class="col-lg-5 col-md-8 align-item-center"> -->
         <tr>
                    
                    <td><?= @$this->Html->image($user->image,['style'=>'max-width:150px;height:150px;border-radius:50%;']) ?></td>
                </tr>
        
            <h3><?= h($user->firstname) ?></h3>

            <table border="3" cellpadding="5">
                
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($user->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($user->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
               
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php
if(h($user->status)==1)
{
    echo "Active";
}
else
{
    echo "Disactive";
}

?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($user->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adharcard') ?></th>
                    <td><?= $this->Number->format($user->adharcard) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $this->Number->format($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($user->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($user->updated) ?></td>
                </tr>
            </table></center>
        </div>
    </div>
</div>
