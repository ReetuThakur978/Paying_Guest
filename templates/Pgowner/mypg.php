<!DOCTYPE html>
<html>
<head>
    <title><?= isset($title)?$title:""; ?></title>
     
</head>
<body>
    <?php
$id = $this->getRequest()->getSession()->read('Auth.user_id');
$role = $this->getRequest()->getSession()->read('Auth.role');

?>

 <?= $this->Form->create(null,['type'=>'get']) ?>
 <div class="form-group col-md-3">
    <?= $this->Form->input('key',['label'=>'Search','placeholder'=>'Enter your Location','class'=>'form-control my-2 my-lg-0','value'=>$this->request->getQuery('key')]) ?></div>
    <div class="form-group col-md-2">
    <?= $this->Form->button('Search',['class'=>'btn btn-primary input-group-text']) ?></div>
    <?= $this->Form->end() ?>
  
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
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


<div class="pgdetails index content">
    
    <h3><?= __('Results for : My PGs') ?></h3>    
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
                    <?php if($role == 1 && $pgdetail->owner_id == $id): ?>
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
                        <?= $this->Html->link(__('View'), ['action' => 'mypgview', $pgdetail->pg_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'mypgedit', $pgdetail->pg_id]) ?>
                         <?php if($pgdetail->status==1): ?>
                        <?= $this->Form->postLink(__('Block'), ['action' => 'userStatus', $pgdetail->pg_id,$pgdetail->status], ['confirm' => __('Are you sure you want to block # {0}?', $pgdetail->pg_id)]) ?>
                        <?php else : ?>
                        <?= $this->Form->postLink(__('Unblock'), ['action' => 'userStatus', $pgdetail->pg_id,$pgdetail->status], ['confirm' => __('Are you sure you want to unlock # {0}?', $pgdetail->pg_id)]) ?>
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
</body>
</html>