<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                      <h3 class="bg-gray p-4">Registration Page</h3>

        
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <fieldset>
    <?php
        # Set Form Template
        $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            // 'input' => '<input type="{{type}}" class="form-control is-invalid" name="{{name}}"{{attrs}}/>',
            'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);

        echo $this->Form->create($users ,['type'=>'file']);
?>
<?php
        # Check field error
        // var_dump($this->Form->isFieldError('fullname'));

        echo $this->Form->controls(
            [
                'firstname' => [
                    'name' => 'firstname',
                    'placeholder' => "Enter your firstname", 
                    'required' => false,
                    // 'label' => 'Full Name',
                    'class' => ($this->Form->isFieldError('firstname')) ? 'form-control is-invalid' : 'form-control'
                ],
                'lastname' => [
                    'name' => 'lastname',
                    'placeholder' => "Enter your lastname", 
                    'required' => false,
                    // 'label' => 'Full Name',
                    'class' => ($this->Form->isFieldError('lastname')) ? 'form-control is-invalid' : 'form-control'
                ],
                'email' => [
                    'placeholder' => "Enter your email", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control'
                ],
                'password' => [
                    'placeholder' => "Enter password", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control'
                ],
                'password_match' => [
                    'placeholder' => "Confirm Password", 
                    'type'=>'password',
                    'required' => false,
                    'class' => ($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control'
                ],
                'adharcard' => [
                    'placeholder' => "Enter your adharcard number here", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('adharcard')) ? 'form-control is-invalid' : 'form-control'
                ],
                'phone' => [
                    'name' => 'phone', 
                    'placeholder' => "Enter your phone number", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control'
                ],
                'image_file' => [
                    // 'placeholder' => "Confirm Password", 
                    'type'=>'file',
                    'required' => false,
                    'class' => ($this->Form->isFieldError('image')) ? 'form-control is-invalid' : 'form-control'
                ],
                // 'role',$roles => [
                //     'placeholder' => "role", 
                //     'required' => false,
                //     'empty' => 'Select Role',
                //     'class' => ($this->Form->isFieldError('role')) ? 'form-control is-invalid' : 'form-control'
                // ],


            ],
            ['legend' => ' ']
        );
        echo $this->Form->select('role',$roles,['empty' => 'Select Role','class' =>($this->Form->isFieldError('role')) ? 'form-control is-invalid' : 'form-control','required' => false]);
        ?><br>
      <center> <?= $this->Form->submit('Registration', ['class' => 'btn btn-primary']);?></center>
        
</fieldset>
        <?= $this->Form->end();?>
</div>
</div>
</div>
</div>
</div>
</div>
</section>