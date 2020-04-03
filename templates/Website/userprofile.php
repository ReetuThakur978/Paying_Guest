<!DOCTYPE html>
<html lang="en">
<title><?= isset($title)?$title:""; ?></title>
<head>
<?php
$name = $this->getRequest()->getSession()->read('Auth.firstname');
$email= $this->getRequest()->getSession()->read('Auth.email');
$phone= $this->getRequest()->getSession()->read('Auth.phone');
$lastname = $this->getRequest()->getSession()->read('Auth.lastname');
// echo $name;
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
                            <img src="images/user/blank.jpg" alt="" class="">
                        </div>
                        <!-- User Name -->
                        <h5 class="text-center"><?php echo $name .' '. $lastname; ?></h5>
                       <!-- <?= $this->Form->create($user,['type'=>'file', 'id'=>'form']); ?> -->
                        <?=$this->Form->input('image',['class' =>'' ,'type'=>'file']); ?>
                        <?= $this->Form->button('Upload image',['class'=>'']); ?>
                         <?= $this->Form->end() ?>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                <!-- Edit Profile Welcome Text -->
                <div class="widget welcome-message">
                    <h2>Edit profile</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p> -->
                </div>
                <!-- Edit Personal Info -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="widget personal-info">
                            <h3 class="widget-header user">Edit Name</h3>
                            <!-- <?= $this->Form->create($user) ?> -->
                            <form name="myForm" method="Post" onsubmit=" return validate()">
                                <!-- First Name -->
                              
                                <div class="form-group">

                                    <label for="first-name">Name</label>
                                    <input type="text" class="form-control" id="last-name" value="<?= $name; ?>" readonly>
                                </div>
                                
                                <!-- Last Name -->
                                <div class="form-group">
                                    <label for="last-name">New Name</label>
                                    
                                    <input type="text" class="form-control" id="last-name" name="firstname">
                                
                                </div>
                                
                                <!-- Submit button -->
                                <center><?= $this->Form->button('Save my changes' ,['class'=>'btn btn-transparent']); ?></center>
                            </form>

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
                        <form method="post">
                            <!-- Current Password -->
                            <div class="form-group">
                                <label for="current-email">Current Email</label>
                                <input type="email" class="form-control" id="current-email" value="<?= $email;?> " readonly>
                            </div>
                            <!-- New email -->
                            <div class="form-group">
                                <label for="new-email">New email</label>
                                <input type="email" class="form-control" id="new-email" name="email">
                            </div>
                            <!-- Submit Button -->
                            <center><?= $this->Form->button('Save Email' ,['class'=>'btn btn-transparent']); ?></center>
                        </form>
                    </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <!-- Change Password -->
                    <div class="widget change-password">
                        <h3 class="widget-header user">Edit Phone Number</h3>
                        <form name="myForm" method="POST" onsubmit=" return validate()">
                            <!-- Current Password -->
                            <div class="form-group">
                                <label for="current-password">Current Number</label>
                                <input type="text" class="form-control" id="current-password"  value="<?= $phone;?>" readonly>
                            </div>
                            <!-- New Password -->
                            <div class="form-group">
                                <label for="new-password">New Number</label>
                                <input type="text" class="form-control" id="new-password" name="number">
                            </div>
                            <!-- Confirm New Password 
                            <div class="form-group">
                                <label for="confirm-password">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirm-password">
                            </div>
                            <!-- Submit Button -->
                            <center><?= $this->Form->button('Change Number' ,['class'=>'btn btn-transparent']); ?></center>
                        </form>
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