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
    </aside>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
   <center> <h3><?= __('Edit : PG owner') ?></h3></center>
        
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
                <legend><?= __('Edit PG owner') ?></legend>
                <?php
                    // echo $this->Form->control('owner_id', ['options' => $users, 'class' =>'border p-3 w-100 my-2']);
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
            
            <?= $this->Form->button('Submit',['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']); ?>
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
