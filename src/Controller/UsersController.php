<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;
  use Cake\Mailer\Email;
  use Cake\Mailer\Mailer;
  use Cake\Mailer\Mail;
  use Cake\Mailer\EmailTransport;
  use Cake\Utility\Security;
  use Cake\ORM\TableRegistry;
  use Cake\Auth\DefaultPasswordHasher;
  

class UsersController extends AppController
{
	public $paginate = [
        'limit' => 5,];
	public function initialize() : void
	{
		parent::initialize();
		$this->loadComponent('Paginator');
	}
    
    public function index()
    {
        
        $this->set("title", "Users List");
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    public function newpg()
    {
        
        $this->set("title", "Users List");
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }


    
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    
    public function register()
    {
    	$this->loadModel('Userroles');
        $user = $this->Users->newEmptyEntity();


        	if ($this->request->is('post')) 
        	{
        	
            	$user = $this->Users->newEntity($this->request->getData());
            	
                if(!$user->getErrors){
                    $image = $this->request->getData('image_file');

                    $name  = $image->getClientFilename();

                    if( !is_dir(WWW_ROOT.'img'.DS.'user-img') )
                    mkdir(WWW_ROOT.'img'.DS.'user-img',0775);
                
                     $targetPath = WWW_ROOT.'img'.DS.$name;

                    if($name)
                    $image->moveTo($targetPath);
                
                    $user->image = 'user-img/'.$name;
                }

            		if ($this->Users->save($user)) 
            		{
                		$this->Flash->success(__('Thanks for registration'));
						return $this->redirect(['action' => 'index']);
            		}
            		$this->Flash->error(__('Registration Failed. Please, try again.'));
        	}
        
        		$roles = $this->Userroles->find('list', [ 
            	'keyField' => 'id',
           		'valueField' => 'user_rolename'
        		]);
        	$this->set('roles', $roles);

            // echo $roles;
            // exit;
        
        	$this->set(compact('user'));
            $this->set("register", "Registration Page");

    }

    
    public function edit($id = null)
    {
        $this->set("title", "Edit Users");
    	$this->loadModel('Userroles');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User has been update'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('User is not update. Please, try again.'));
        }
        $roles = $this->Userroles->find('list', [ 
            'keyField' => 'id',
            'valueField' => 'user_rolename'
        ]);
        $this->set('roles', $roles);
        $this->set(compact('user'));
    }

    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $user = $this->Users->get($id);
    //     if ($this->Users->delete($user)) {
    //         $this->Flash->success(__('The user has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    
        public function logout()
        {
          $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in
             if ($result->isValid()) {
                 $this->Authentication->logout();
                 return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
         }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login','register','forgotpassword','resetpassword']);
    }

public function login() {
     $this->set("title", "Admin Login Page");
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        // redirect to /articles after login success
    
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Users',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}
    public function forgotpassword()
    {
        if($this->request->is('post'))
        {
            $myemail = $this->request->getData('email');
            $mytoken = Security::hash(Security::randomString(25));

            $userTable= TableRegistry::get('Users');
            $user =$userTable->find('all')->where(['email'=>$myemail])->first();
            // $user->password = ' ';
            $user->token =$mytoken;
            if($userTable->save($user))
            {

                    $email = new Mailer();
                    
                   $email=$email->setTransport('gmail')
                     ->setEmailFormat('html')
                     ->setFrom(['reetuthakur.zapbuild@gmail.com'=>'Reetu Thakur'])
                     ->setSubject('Please confirm your password')
                     ->setTo($myemail);
                    $email->deliver('Hello ' .$myemail. '<br>Please click link below to reset your password<br><br><br><a href="http://localhost:8765/users/resetpassword/'.$mytoken.'">Reset Password </a>');

                      $this->Flash->success('Reset password link has been sent to your ('.$myemail.').please check your email');

            }   
        }
    }

    public function resetpassword($token)
    {
        if($this->request->is('post'))
        {
            $hasher= new DefaultPasswordHasher();
            $mypass = $hasher->hash($this->request->getData('password'));

            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['token'=>$token])->first();
            $user->password =$mypass;
            if($userTable->save($user)){
                return $this->redirect(['action'=>'login']);
            }
        }
       
    }
    public function search()
    {

        $this->request->allowMethod('ajax');
   
        $keyword = $this->request->getQueryParams('keyword');

        $query = $this->Users->find('all',[
              'conditions' => ['firstname LIKE'=>'%'.$keyword['keyword'].'%'],
              // 'order' => ['Users.user_id'=>'DESC'],
              'limit' => 10
        ]);

        $this->set('users', $this->paginate($query));
        $this->set('_serialize', ['users']);

    }

 public function userStatus($id=null,$status)
{
    $this->request->allowMethod(['post']);
    $user=$this->Users->get($id);

    if($status == 1)
        $user->status = 0;
    else
       $user->status = 1; 

   if($this->Users->save($user))
   {
    // $this->Flash->success(__('The status has been changed'));
    return $this->redirect(['action'=>'index']);
   }
   // return $this->redirect(['action'=>'index']);
    
}

    public function usersStatus($id=null,$status)
{
    $this->request->allowMethod(['post']);
    $user=$this->Users->get($id);

    if($status == 1)
        $user->status = 0;
    else
       $user->status = 1; 

   if($this->Users->save($user))
   {
    // $this->Flash->success(__('The status has been changed'));
    return $this->redirect(['action'=>'newpg']);
   }
   // return $this->redirect(['action'=>'index']);
    
}
}
