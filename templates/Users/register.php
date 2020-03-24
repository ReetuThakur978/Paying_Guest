<!DOCTYPE html>
<html>
<head>
    <title></title>
   <!--  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <SCRIPT type="text/javascript">
function validate()
      {
        var firstname=document.myForm.firstname.value; 
        var phone=document.myForm.phone.value;
        var a =document.getElementById("pass").value;
        var password=document.myForm.password.value;
        var adhar=document.myForm.adharcard.value;
        var emailID = document.myForm.email.value;
        atpos = emailID.indexOf("@");
          dotpos = emailID.lastIndexOf(".");                          


 if (firstname==null || firstname=="")
        {  
             alert("Please enter your firstname");  
             return false;  
          }

 if( document.myForm.lastname.value == "" )
         {
            alert( "Please provide your lastname!" );
            document.myForm.lastname.focus() ;
            return false;
         } 
  if( document.myForm.adharcard.value == "" )
         {
            alert( "Please enter your adharcard number" );
            document.myForm.adharcard.focus() ;
            return false;
         } 
    if(adhar.length<12)  
    {
      alert("Please enter correct adher card number");
       
      return false;   
    } 
    else if(adhar.length>12)
    {
        alert("Please enter correct adher card number");  
        return false; 
    }             

    if (document.myForm.phone.value=="")
         { 
              alert("Please enter your vaild phone number");
              document.myForm.phone.focus();
              return false;
          }


         
         else if(!(a.charAt(0)=="9" || a.charAt(0)=="8" || a.charAt(0)=="7" || a.charAt(0)=="6"))
            {
                alert("Please enter correct Phone number");
                return false;
            }

      if(password.length<6)
            {  
               alert("Password must be at least 6 characters long.");  
               return false; 
            }         
            
          else if(password.length>16) 
              {
                alert("Maximum length is 16 characters.");
                return false;
              }
              

       if (document.myForm.password1.value=="")
         { 
              alert("Please confirm your password");
              document.myForm.password1.focus();
              return false;
          }       

      if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert("Please enter correct email ID");
            document.myForm.email.focus() ;
            return false;
         }
      
         
         if( document.myForm.email.value == "" )
         {
            alert( "Please provide your Email!" );
            document.myForm.email.focus() ;
            return false;
         }             


}

</SCRIPT> -->
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
                              
                                echo $this->Form->text('firstname', ['name' => 'firstname' , 'placeholder'=>'Enter your firstname', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('lastname', ['name' => 'lastname' , 'placeholder'=>'Enter your lastname', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('email', ['name' => 'email' , 'placeholder'=>'Enter your email', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->password('password', ['name' => 'password' , 'placeholder'=>'Enter your password', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->password('confirm_password', ['name' => 'password1' , 'placeholder'=>'Confirm Password', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('adharcard', ['name' => 'adharcard' , 'placeholder'=>'Enter your adhar card number', 'class' =>'border p-3 w-100 my-2']);
                                echo $this->Form->text('phone', ['name' => 'phone' , 'placeholder'=>'Enter your phone number', 'class' =>'border p-3 w-100 my-2' , 'id'=>'pass']);
                               
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
