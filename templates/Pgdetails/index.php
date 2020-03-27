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
            <?= $this->Html->link(__('Rooms booked'), ['controller'=>'Rooms','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('New PG request'), ['action' => ''], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


<div class="pgdetails index content">
    <?= $this->Html->link(__('New Pgdetail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Results for : PG owner') ?></h3>
    <div class="table-responsive">
        <table border="2" cellpadding="10">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('SrNo') ?></th>
                    <th><center><?= $this->Paginator->sort('Name') ?></center></th>
                    <th><center><?= $this->Paginator->sort('Location') ?></center></th>
                    <th><?= $this->Paginator->sort('Gender') ?></th>
                    <th><?= $this->Paginator->sort('Availability') ?></th>
                    <th><?= $this->Paginator->sort('Phone') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 0;?>
                <?php foreach ($pgdetails as $pgdetail): ?>
                <tr>
                    <!-- <td><?= $this->Number->format($pgdetail->pg_id) ?></td>
                    <td><?= $pgdetail->has('user') ? $this->Html->link($pgdetail->user->name, ['controller' => 'Users', 'action' => 'view', $pgdetail->user->user_id]) : '' ?></td> -->
                    <td><center><?= ++$counter; ?></center></td>
                    <td><center><?= $pgdetail->has('user') ? $this->Html->link($pgdetail->user->firstname, ['controller' => 'Users', 'action' => 'view', $pgdetail->user->user_id]) : '' ?></center></td>
                    <td><center><?= h($pgdetail->location) ?></center></td>
                    <td><center><?= h($pgdetail->gender) ?></center></td>
                    <td><center><?= h($pgdetail->availability) ?></center></td>
                    <td><?= $this->Number->format($pgdetail->phone) ?></td>
                    <td><center>    <?php
if(h($pgdetail->status)==1)
{
    echo "Active";
}
else
{
    echo "Disactive";
}

?></center></td>


                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pgdetail->pg_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pgdetail->pg_id]) ?>
                        <?= $this->Form->postLink(__('Block'), ['action' => 'delete', $pgdetail->pg_id], ['confirm' => __('Are you sure you want to delete # {0}?', $pgdetail->pg_id)]) ?>
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