<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= isset($title)?$title:""; ?></title>
</head>
<?php
$userid = $this->getRequest()->getSession()->read('Auth.user_id');
 // echo $room;
?>

 
<body class="body-wrapper">
<section class="login py-5 border-top-1">
        <!-- <div class="container"> -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Fill your payment detail</h3>   
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">

           
            <fieldset>   
                                <!-- <input type="text" class="border p-3 w-100 my-2'"  value="<?= $name; ?>" readonly><br><br> -->
                                <!-- <input type="text" class="border p-3 w-100 my-2'"  value="<?= $email; ?>" readonly> -->

                              <?= $this->Form->create($payments) ?>
                             <?php $get=h($room->room_id) ?>
                             <?php $ownerid=h($room->pgdetail->owner_id) ?>

                               <?php
                               echo $this->Form->text('transientuser_id',['name'=>'transientuser_id','value' => $userid,'class' =>'border p-3 w-100 my-2','hidden']);

                              echo $this->Form->text('pgowner_id',['value' => $ownerid,'name'=>'pgowner_id','class' =>'border p-3 w-100 my-2','hidden']);

                               echo $this->Form->text('amount',['name' => 'amount' , 'placeholder'=>'Enter paying amount', 'class' =>'border p-3 w-100 my-2']);

                                echo 'Choose Payment Option:- '.'<br>';
                                $options = array('Creditcard' => 'Credit card', 'Debitcard' => 'Debit card','Googlepay'=>'Google Pay');
                        
                                echo $this->Form->select('payment_mode', $options, ['name'=>'payment_mode','class' =>'border p-3 w-100 my-2']).'<br>';

                                 echo $this->Form->text('transaction_id',['value' => $get,'name'=>'transaction_id','class' =>'border p-3 w-100 my-2','hidden']);

                                ?>
                                <center>

                                <?= $this->Form->button('Submit', ['controller'=>'Website','action' => 'home','class'=>'btn btn-primary']); ?> 
                            </center>
                            </fieldset>

                             
                      
                </div>
            </div>
        </div>
    </div>
</div>

</section>
           
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