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
            <!--  -->
            <?= $this->Html->link(__('All transient guest'), ['controller'=>'Pgowner','action' => 'transient'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Add new PG'), ['controller'=>'Pgowner','action' => 'addnewpg'], ['class' => 'side-nav-item']) ?><br><br>
            <?= $this->Html->link(__('Room available'), ['controller'=>'Pgowner','action' => 'roomavailable'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


    <div class="column-responsive column-80">
        <div class="pgdetails view content">
             <h3><?= __('View : PG ') ?></h3>
            <br>
            <table border="3" cellpadding="5">
                <tr>
                    <th><?= __('PG owner name') ?></th>
                    <td><?= $pgdetail->has('user') ? $this->Html->link($pgdetail->user->firstname, ['controller' => 'Users', 'action' => 'view', $pgdetail->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Room') ?></th>
                    <td><?= h($pgdetail->room) ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($pgdetail->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($pgdetail->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Area') ?></th>
                    <td><?= h($pgdetail->area) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($pgdetail->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Availability') ?></th>
                    <td><?= h($pgdetail->availability) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?php
if(h($pgdetail->status)==1)
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
                    <th><?= __('Pg Id') ?></th>
                    <td><?= $this->Number->format($pgdetail->pg_id) ?></td>
                </tr>
            
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= $this->Number->format($pgdetail->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($pgdetail->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated') ?></th>
                    <td><?= h($pgdetail->updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
