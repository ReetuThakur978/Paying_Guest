<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title)?$title:""; ?></title>
</head>
 <?= $this->Form->create(null,['type'=>'get']) ?>
 <div class="form-group col-md-3">
    <?= $this->Form->input('key',['label'=>'Search','placeholder'=>'Enter Rent or Seaters','class'=>'form-control my-2 my-lg-0','value'=>$this->request->getQuery('key')]) ?></div>
    <div class="form-group col-md-2">
    <?= $this->Form->button('Search',['class'=>'btn btn-primary input-group-text']) ?></div>
    <?= $this->Form->end() ?>

<body>
  <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu : ') ?></h4>

            <?= $this->Html->link(__('PG owner'), ['controller'=>'Pgdetails','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <!--  -->
            <?= $this->Html->link(__('Rooms available'), ['controller'=>'Rooms','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Rooms booked'), ['controller'=>'Rooms','action' => 'index'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('New PG request'), ['controller'=>'users','action' => 'newpg'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<div class="rooms index content">
    <?= $this->Html->link(__('New Room'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Results for : Rooms available') ?></h3>
    <div class="table-responsive">
        <table border="2" cellpadding="14">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('SrNo') ?></th>
                    <th><?= $this->Paginator->sort('Pg_id') ?></th>
                    <th><?= $this->Paginator->sort('Seater') ?></th>
                    <th><?= $this->Paginator->sort('Rent') ?></th>
                    <th><?= $this->Paginator->sort('Security Charge') ?></th>
                    <th><?= $this->Paginator->sort('Seates_available') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                 <?php $counter = 0;?>
                <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><center><?= ++$counter; ?></center></td>
                    <td><?= $room->has('pgdetail') ? $this->Html->link($room->pgdetail->pg_id, ['controller' => 'Pgdetails', 'action' => 'view', $room->pgdetail->pg_id]) : '' ?></td>
                    <td><center><?= h($room->seater) ?></center></td>
                    <td><center><?= $this->Number->format($room->rent) ?></center></td>
                    <td><center><?= $this->Number->format($room->security_charge) ?></center></td>
                    <td><center><?= $this->Number->format($room->seates_available) ?></center></td>
                    <!-- <td><center><?= h($room->status) ?></center></td> -->
                <td><center>    <?php
if(h($room->status)==1)
{
    echo "Active";
}
else
{
    echo "Disactive";
}

?></center></td>


                        <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $room->room_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $room->room_id]) ?>
                        <?= $this->Html->link(__('AddImage'), ['action' => 'addimage', $room->room_id]) ?>
                      <?php if($room->status==1): ?>
                        <?= $this->Form->postLink(__('Block'), ['action' => 'userStatus', $room->room_id,$room->status], ['confirm' => __('Are you sure you want to block # {0}?', $room->room_id)]) ?>
                        <?php else : ?>
                        <?= $this->Form->postLink(__('Unblock'), ['action' => 'userStatus', $room->room_id,$room->status], ['confirm' => __('Are you sure you want to unlock # {0}?', $room->room_id)]) ?>
                        <?php endif; ?>
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