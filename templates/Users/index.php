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

            <?= $this->Html->link(__('PG owner'), ['controller'=>'Pgdetails','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <!--  -->
            <?= $this->Html->link(__('Rooms available'), ['controller'=>'Rooms','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Rooms booked'), ['action' => 'add'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('New PG request'), ['action' => ''], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>&nbsp

<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'register'], ['class' => 'button float-right']) ?><br>
    <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table border="2" cellpadding="14">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('SrNo') ?></th>
                    <th><?= $this->Paginator->sort('Firstame') ?></th>
                    <th><?= $this->Paginator->sort('Lastname') ?></th>
                    <th><center><?= $this->Paginator->sort('email') ?></center></th>
                    <th><center><?= $this->Paginator->sort('adharcard') ?><center></th>
                    <th><center><?= $this->Paginator->sort('role') ?><center></th>   
                    <th><center><?= $this->Paginator->sort('updated') ?><center></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
               <?php $counter = 0;?>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><center><?= ++$counter; ?></center></td>
                    <td><center><?= h($user->firstname) ?></center></td>
                    <td><center><?= h($user->lastname) ?></center></td>
                    <td><center><?= h($user->email) ?></center></td>
                    <td><center><?= $this->Number->format($user->adharcard) ?></center></td>
                    <td><center><?= $this->Number->format($user->role) ?></center></td>
                    <td><center><?= h($user->updated) ?></center></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->user_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id]) ?>
                        <?= $this->Html->link(__('Block'), ['action' => 'view', $user->user_id]) ?>
                    </td>
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
</body>
</html>