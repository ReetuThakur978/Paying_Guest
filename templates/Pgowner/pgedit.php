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
</aside>
</div>
        <section class="login py-5 border-top-1">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 align-item-center">
<div class="border border">

    
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user,['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Profile') ?></legend>
                <?php
                    echo $this->Form->control('firstname', ['name' => 'firstname' , 'placeholder'=>'Enter your name', 'class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('lastname',['name' => 'lastname' , 'placeholder'=>'Enter your Username', 'class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('change_image',['type'=>'file' , 'class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter you adhar card number', 'class' =>'border p-3 w-100 my-2']);
                    // ?echo $this->Form->control('role');
                    //echo $this->Form->control('status');
                    // echo $this->Form->select('role', $roles, ['empty' => 'Select Role', 'id' => 'user_rolename' ,'class' =>'border p-3 w-100 my-2']);

                    echo $this->Form->control('phone', ['name' => 'phone' , 'placeholder'=>'Enter your phone number', 'class' =>'border p-3 w-100 my-2']);
                ?>
            
            <center><?= $this->Form->button('Submit' ,['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']); ?></center>
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