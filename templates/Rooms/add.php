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
    </aside>
</div>
<section class="login py-5 border-top-1">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-8 align-item-center">
<div class="border border">
    <div class="column-responsive column-80">
        <div class="rooms form content">
            <?= $this->Form->create($room,['type'=>'file', 'id'=>'form']) ?>
            <fieldset>
                <legend><?= __('Add Room') ?></legend>
                <?php
                    echo $this->Form->control('pg_id', ['options' => $pgdetails ,'class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('ac_noac',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('seater',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('rent',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->input('image',['class' =>'border p-3 w-100 my-2' ,'type'=>'file']);
                    echo $this->Form->control('with_or_without_food',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('security_charge',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('notic_period',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('seates_available',['class' =>'border p-3 w-100 my-2']);
                    echo $this->Form->control('status',['class' =>'border p-3 w-100 my-2']);
                ?>
           
            <?= $this->Form->button('Submit',['class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']); ?>
             </fieldset>
            <?= $this->Form->end() ?>
            <script> 
$("#form").submit(function(){
  $("#form").submit(function(){
    return false;
});
    return true;


});
</script>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
</body>
</html>