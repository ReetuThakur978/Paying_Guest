<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title)?$title:""; ?></title>
</head>
<body>

 <h3><?= $this->Html->link(__('View Profile'), ['controller'=>'Pgowner','action' => 'viewprofile'], ['class' => 'side-nav-item']) ?><br><br></h3>
<div class="row"> 
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu : ') ?></h4>

            <?= $this->Html->link(__('My PGs'), ['controller'=>'Pgowner','action' => 'mypg'], ['class' => 'side-nav-item']) ?><br><br>
            <!--  -->
            <?= $this->Html->link(__('All transient guest'), ['controller'=>'Pgowner','action' => 'transient'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Add new PG'), ['controller'=>'Pgowner','action' => 'addnewpg'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Room available'), ['controller'=>'Pgowner','action' => 'roomavailable'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    
<div class="rooms index content">
<h3><?= __('Results for : All transient guest') ?></h3>
     <div class="table-responsive">
        <table border="2" cellpadding="10">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('SrNo') ?></th>
                    <th><center><?= $this->Paginator->sort('Name') ?></center></th>
                    <th><center><?= $this->Paginator->sort('Image') ?></center></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('Created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
             <tbody>

                <?php $counter = 0;?>

               <tr>
               
                 <?php foreach ($users as $user): ?>
 <?php if($user->role==2): ?>
                <td><center><?= ++$counter; ?></center></td>
                <td><center><?= h($user->firstname) ?></center></td>
<td><?= @$this->Html->image($user->image,['style'=>'max-width:50px;height:50px;border-radius:50%;']) ?></td>
                <td><center><?= h($user->email) ?></center></td>
                <td><center><?= h($user->created) ?></center></td>

                <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->user_id]) ?>
                       

                         <?php if($user->status==1): ?>
                        <?= $this->Form->postLink(__('Block'), ['action' => 'transientStatus', $user->user_id,$user->status], ['confirm' => __('Are you sure you want to block # {0}?', $user->user_id)]) ?>
                        <?php else : ?>
                        <?= $this->Form->postLink(__('Unblock'), ['action' => 'transientStatus', $user->user_id,$user->status], ['confirm' => __('Are you sure you want to unlock # {0}?', $user->user_id)]) ?>
                        <?php endif; ?>
                    </td>
 <?php endif; ?>
</tr>
<?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
</div>
	
</body>
</html>