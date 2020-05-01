<!DOCTYPE html>
<html lang="en">
<head>
<title><?= isset($title)?$title:""; ?></title>
  <!-- SITE TITTLE -->
 
</head>

<body class="body-wrapper">



<section class="login py-5 border-top-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h3 class="bg-gray p-4">Login Now</h3>
                     <?= $this->Form->create() ?>
                        <fieldset class="p-4">
                          <?php
                            echo $this->Form->text('Email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->password('Password', ['name' => 'password' , 'placeholder'=>'Enter your password', 'class' =>'border p-3 w-100 my-2']);
                                ?>
                            <div class="loggedin-forgot">
                                    <input type="checkbox" id="keep-me-logged-in">
                                    <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                            </div>
                            <?= $this->Form->button('Log in' ,['name'=>'submit','class'=>'d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3']); ?><br>
                           
                            <!-- <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a> -->

  <?= $this->Html->link(__('Forget Password?'), ['action' => 'forgotpassword', 'class' => 'mt-3 d-block text-primary']) ?><br>
  <?= $this->Html->link(__('Register Yourself'), ['action' => 'register', 'class' => 'mt-3 d-block text-primary']) ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


</body>

</html>