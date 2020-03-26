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
            <?= $this->Html->link(__('New PG request'), ['action' => ''], ['class' => 'side-nav-item']) ?>        </div>
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <?php
$image= base64_encode (stream_get_contents($room->image));
?>
    <div class="column-responsive column-80">
        <div class="rooms view content">
            <center>  <h3><?= __('View : Rooms available') ?></h3><br><br>
          <tr>
                    <td><?='<img src="data:image/jpeg;base64,'.$image.'"/>'?></td>
                </tr>
            <h3><?= h($room->pgdetail->address) ?></h3></center><br>
            <table border="3" cellpadding="5">
                <tr>
                    <th><?= __('Pgdetail') ?></th>
                    <td><?= $room->has('pgdetail') ? $this->Html->link($room->pgdetail->pg_id, ['controller' => 'Pgdetails', 'action' => 'view', $room->pgdetail->pg_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ac Noac') ?></th>
                    <td><?= h($room->ac_noac) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seater') ?></th>
                    <td><?= h($room->seater) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('With Or Without Food') ?></th>
                    <td><?= h($room->with_or_without_food) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($room->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Room Id') ?></th>
                    <td><?= $this->Number->format($room->room_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rent') ?></th>
                    <td><?= $this->Number->format($room->rent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Security Charge') ?></th>
                    <td><?= $this->Number->format($room->security_charge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notic Period') ?></th>
                    <td><?= $this->Number->format($room->notic_period) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seates Available') ?></th>
                    <td><?= $this->Number->format($room->seates_available) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($room->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($room->updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>