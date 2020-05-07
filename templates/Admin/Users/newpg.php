<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title)?$title:""; ?></title>
</head>
<body>

                    <!-- <?php
                    echo $this->Form->control('search');
                    ?> -->
<div class="row"> 
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu : ') ?></h4>

            <?= $this->Html->link(__('PG owner'), ['controller'=>'Pgdetails','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <!--  -->
            <?= $this->Html->link(__('Rooms available'), ['controller'=>'Rooms','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Rooms booked'), ['action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('New PG request'), ['controller'=>'users','action' => 'newpg'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>&nbsp

<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'register'], ['class' => 'button float-right']) ?>
    <h3><?= __('Results for: New PG Request') ?></h3>

    <div class="table-content">
    <div class="table-responsive">
        <table border="2" cellpadding="14">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('SrNo') ?></th>
                    <th><?= $this->Paginator->sort('Firstame') ?></th>
                    <th><?= $this->Paginator->sort('Lastname') ?></th>
                    <th><center><?= $this->Paginator->sort('Email') ?></center></th>
                    <th><center><?= $this->Paginator->sort('Status') ?></center></th>
                    <th><center><?= $this->Paginator->sort('Role') ?></center></th>   
                    <th><center><?= $this->Paginator->sort('Updated') ?></center></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
               <?php $counter = 0;?>
                <?php foreach ($users as $user): ?>
                     <?php if($user->role==1): ?>
                <tr>
                    <td><center><?= ++$counter; ?></center></td>
                    <td><center><?= h($user->firstname) ?></center></td>
                    <td><center><?= h($user->lastname) ?></center></td>
                    <td><center><?= h($user->email) ?></center></td>
                    <td><center>    <?php
if(h($user->status)==1)
{
    echo "Active";
}
else
{
    echo "Disactive";
}

?></center></td>
                    <td><center><?= $this->Number->format($user->role) ?></center></td>
                    <td><center><?= h($user->updated) ?></center></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->user_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id]) ?>

                        <?php if($user->status==1): ?>
                        <?= $this->Form->postLink(__('Block'), ['action' => 'usersStatus', $user->user_id,$user->status], ['confirm' => __('Are you sure you want to block # {0}?', $user->user_id)]) ?>
                        <?php else : ?>
                        <?= $this->Form->postLink(__('Unblock'), ['action' => 'usersStatus', $user->user_id,$user->status], ['confirm' => __('Are you sure you want to unlock # {0}?', $user->user_id)]) ?>
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