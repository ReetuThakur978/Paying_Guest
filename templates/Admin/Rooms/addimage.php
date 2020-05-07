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
                echo $this->Form->control('image_file', array('type'=>'file','class' =>'border p-3 w-100 my-2'));
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