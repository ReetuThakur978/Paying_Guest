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
                      <?= $this->Form->create($user,['type' => 'file']) ?>
                        <?=$this->Form->control('image',['type'=>'file']); ?><br>
                        <?= $this->Form->button('Upload image',['class'=>'']); ?>
                         <?= $this->Form->end() ?>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                <!-- Edit Profile Welcome Text -->
                <div class="widget welcome-message">
                    <h2>Edit profile</h2>
                    
                </div>
                <!-- Edit Personal Info -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widget personal-info">
                            <h3 class="widget-header user">Edit Name</h3>
                            <?= $this->Form->create($user) ?>
                           
                                <div class="form-group">

                                   <!--  <label for="first-name">Name</label> -->
                                    <!-- <input type="text" class="form-control" id="last-name" value="<?= $name; ?>" readonly> -->
                                    <?php
                    echo $this->Form->control('firstname' ,['name' =>'firstname','readonly','class' =>'form-control']);
                                    ?>
                                </div>
                                
                                <!-- Last Name -->
                                
                                <div class="form-group">
                                    <label for="last-name">New Name</label>
                                    <?php
                    echo $this->Form->control(' ' ,['name' =>'firstname','class' =>'form-control']);
                                    ?>
                                
                                </div>
                                
                                <!-- Submit button -->
                                <center><?= $this->Form->button('Save my changes' ,['class'=>'btn btn-transparent']); ?></center>
                           <?= $this->Form->end() ?>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- Change Password -->
                    <div class="widget change-password">
                        <h3 class="widget-header user">Edit Password</h3>
                        <form method="POST">
                            <!-- Current Password -->
                            <div class="form-group">
                                <label for="current-password">Current Password</label>
                                <input type="password" class="form-control" id="current-password" name="password">
                            </div>
                            <!-- New Password -->
                            <div class="form-group">
                                <label for="new-password">New Password</label>
                                <input type="password" class="form-control" id="new-password" name="password">
                            </div>
                            
                            <center><?= $this->Form->button('Save my changes' ,['class'=>'btn btn-transparent']); ?></center>
                        </form>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- Change Email Address -->
                    <div class="widget change-email mb-0">
                        <h3 class="widget-header user">Edit Email Address</h3>
                        <?= $this->Form->create($user) ?>
                            <!-- Current Password -->
                            <div class="form-group">
                                <!-- <label for="current-email">Current Email</label>
                                <input type="email" class="form-control" id="current-email" value="<?= $email;?> " readonly> -->
                                <?php
                    echo $this->Form->control('email' ,['name' =>'email','readonly','class' =>'form-control']);
                                    ?>
                            </div>
                            <!-- New email -->
                            <div class="form-group">
                                <label for="new-email">New email</label>
                                 <?php
                    echo $this->Form->control(' ' ,['name' =>'email','class' =>'form-control']);
                                    ?>
                            </div>
                            <!-- Submit Button -->
                            <center><?= $this->Form->button('Save Email' ,['class'=>'btn btn-transparent']); ?></center>
                       <?= $this->Form->end() ?>
                    </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <!-- Change Password -->
                    <div class="widget change-password">
                        <h3 class="widget-header user">Edit Phone Number</h3>
                       <?= $this->Form->create($user) ?>
                            <!-- Current Password -->
                            <div class="form-group">
                                <!-- <label for="current-password">Current Number</label>
                                <input type="text" class="form-control" id="current-password"  value="<?= $phone;?>" readonly> -->
                                <?php
                    echo $this->Form->control('phone' ,['name' =>'phone','readonly','class' =>'form-control']);
                                    ?>
                            </div>
                            <!-- New Password -->
                            <div class="form-group">
                                <label for="new-password">New Number</label>
                                <?php
                    echo $this->Form->control(' ' ,['name' =>'phone','class' =>'form-control']);
                                    ?>
                            </div>
                            <!-- Confirm New Password 
                            <div class="form-group">
                                <label for="confirm-password">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirm-password">
                            </div>
                            <!-- Submit Button -->
                            <center><?= $this->Form->button('Change Number' ,['class'=>'btn btn-transparent']); ?></center>
                        <?= $this->Form->end() ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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