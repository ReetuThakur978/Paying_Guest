<!DOCTYPE html>
<html lang="en">
<title><?= isset($title)?$title:""; ?></title>
<head>
<?php
$name = $this->getRequest()->getSession()->read('Auth.firstname');
$email= $this->getRequest()->getSession()->read('Auth.email');
$phone= $this->getRequest()->getSession()->read('Auth.phone');
$lastname = $this->getRequest()->getSession()->read('Auth.lastname');
$image = $this->getRequest()->getSession()->read('Auth.image');
$id = $this->getRequest()->getSession()->read('Auth.user_id');
// echo $id;
?>
<section class="user-profile section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                <div class="sidebar">
                    <!-- User Widget -->
                    <div class="widget user">
                        <!-- User Image -->
                        <div class="image d-flex justify-content-center">
                            
                            <?= $this->Html->image($image) ?>
                        </div>
                        <!-- User Name -->
                        <h5 class="text-center"><?php echo $name .' '. $lastname; ?></h5>
                       <!--  -->
                        <?=$this->Form->input('image',['type'=>'file']); ?>
                        <?= $this->Form->button('Upload image',['class'=>'']); ?>
                         <?= $this->Form->end() ?>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                <!-- Edit Profile Welcome Text -->
                <div class="widget welcome-message">
                    <h2>Fill your detail for PG Booking</h2>   
                </div>
                
            <?= $this->Form->create($user, array('name' => 'myForm','type'=>'file' ,'onsubmit'=>' return validate()')) ?>
            <fieldset> 
               
                 
                              
                                <input type="text" class="border p-3 w-100 my-2'"  value="<?= $name; ?>" readonly><br><br>
                                <input type="text" class="border p-3 w-100 my-2'"  value="<?= $email; ?>" readonly>
                               <?php 
                               echo $this->Form->text('days',['name' => 'lastname' , 'placeholder'=>'Enter how many days you stay', 'class' =>'border p-3 w-100 my-2']);
                               echo $this->Form->text('person', ['name' => 'email' , 'placeholder'=>'Enter how many person you shift', 'class' =>'border p-3 w-100 my-2']);
                               echo $this->Form->text('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter your adhar card number', 'class' =>'border p-3 w-100 my-2']);
                               echo $this->Form->control('Any Requirements', array('type' => 'textarea','class' =>'border p-3 w-100 my-2'));
                                ?>

                               <center><a href="" data-toggle="modal" data-target="#deleteaccount"><strong>Submit detail</strong></a>

                                <!-- <?= $this->Form->bo('Submit' ,['value'=>'Submit','data-toggle'=>'modal','data-target'=>'#deleteaccount' ,'class'=>'fa fa-power-off']); ?> -->
                            </center>

                    


                            </fieldset>
                            <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <!-- <img src="<?= $baseurl ?> webroot/images/account/Account1.png" class="img-fluid mb-2" /> -->
                        <h6 class="py-2">Are you sure you want to Book this PG?</h6>
                        <p>Please check the filling details onces again.</p>
                        
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <?= $this->Html->link(__('Submit'), ['controller'=>'Website','action' => 'payment','class'=>'btn btn-primary']) ?> 
                      </div>
                    </div>
                  </div>
                </div>
           
                                      <?= $this->Form->end() ?>
                
 <script>
$("#form").submit(function(){
  $("#form").submit(function(){
    return false;
});
    return true;


});
</script>
</body>

</html>