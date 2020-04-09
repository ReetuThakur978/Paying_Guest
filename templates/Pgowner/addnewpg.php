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
    </aside>
</div>
     <section class="login py-5 border-top-1">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 align-item-center">
<div class="border border">

    <div class="column-responsive column-80">
        <div class="pgdetails form content">
            <?= $this->Form->create($pgdetail) ?>
            <fieldset>
                <legend><?= __('Add Your PG') ?></legend>
                <?php
                   echo $this->Form->select('owner_id',$users,['empty' => 'Select Role','class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('room',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('location',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('address',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('area',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('gender',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('availability',['class' =>'border p-3 w-100 my-2']);
                    // echo $this->Form->control('no_of_room',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('status',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('phone',['class' =>'border p-3 w-100 my-2']);
                ?>
           
            <center><?= $this->Form->button('Submit',['class'=>'btn btn-primary']) ;?></center>
             </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>