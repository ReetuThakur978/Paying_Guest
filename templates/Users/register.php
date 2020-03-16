<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <SCRIPT type="text/javascript">
// function validate()
//       {
//         var firstname=document.myForm.firstname.value; 
//  if (firstname==null || firstname=="")
//         {  
//              alert("Please enter your firstname");  
//              return false;  
//           }


//     }

// $(document).ready(function(){
//     $("input[type='submit']").click(function(){
//         var isValid = true;
//         var focusInput = null;
//         var firtName = $("input[name='data[$user][firstname]']");
//         var lastName = $("input[name='data[$user][lastname]']");
//         if ($(firtName) == null || $(firtName).val() == null || $(firtName).val() == "") {
//             if (focusInput == null)
//                 focusInput = $(firtName);
//             $(firtName).addClass("error");

//             isValid = false;
//         }
//         else
//             $(firtName).removeClass("error");

//         if ($(lastName).val() == null || $(lastName).val() == "") {
//             if (focusInput == null)
//                 focusInput = $(lastName);
//             $(lastName).addClass("error");
//             isValid = false;
//         }
//         else
//             $(lastName).removeClass("error");
//         if (!isValid)
//             $(focusInput).focus();

//         return isValid;

//     });     
// });

// $('form').on('submit', function (e) {
//     var focusSet = false;
//     if (!$('firstname').val()) {
//         if ($("firstname").parent().next(".validation").length == 0) // only add if not added
//         {
//             $("firstname").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter firstname</div>");
//         }
//         e.preventDefault(); // prevent form from POST to server
//         $('firstname').focus();
//         focusSet = true;
//     } else {
//         $("firstname").parent().next(".validation").remove(); // remove it
//     }
    // if (!$('#password').val()) {
    //     if ($("#password").parent().next(".validation").length == 0) // only add if not added
    //     {
    //         $("#password").parent().after("<div class='validation' style='color:red;margin-bottom: 20px;'>Please enter password</div>");
    //     }
    //     e.preventDefault(); // prevent form from POST to server
    //     if (!focusSet) {
    //         $("#password").focus();
    //     }
    // } else {
    //     $("#password").parent().next(".validation").remove(); // remove it
    // }
// });  

</SCRIPT>
</head>
<body>

<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>

        
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user, array('name' => 'myForm', 
            'onsubmit'=>' return validate()',
        )) ?>
            <fieldset> 
               
                 <?php
                              
                                echo $this->Form->text('Firstname', ['name' => 'firstname' , 'placeholder'=>'Enter your firstname', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('Lastname', ['name' => 'lastname' , 'placeholder'=>'Enter your lastname', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('Email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->password('Password', ['name' => 'password' , 'placeholder'=>'Enter your password', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->password('password', ['name' => 'password' , 'placeholder'=>'Confirm Password', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter your adhar card number', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('phone', ['name' => 'phone' , 'placeholder'=>'Enter your phone number', 'class' =>'border p-3 w-100 my-2']);
                               
                                echo $this->Form->select('role',$roles,['empty' => 'Select Role','class' =>'border p-3 w-100 my-2']);
                        
                                ?>
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
                                <?= $this->Form->button('Submit' ,['name'=>'submit','class'=>'d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold']); ?>

                            </fieldset>

           
                                      <?= $this->Form->end() ?>
        
                         </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>