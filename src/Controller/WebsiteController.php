<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;
// use App\Controller\AppController;
// use cake\Routing\Router;
  use Cake\Mailer\Email;
  use Cake\Mailer\Mailer;
  use Cake\Mailer\Mail;
  use Cake\Mailer\EmailTransport;
  use Cake\Auth\DefaultPasswordHasher;
  use Cake\Utility\Security;
  use Cake\ORM\TableRegistry;
  use Cake\View\Helper\UrlHelper;
  use Cake\Http\ServerRequest;

class WebsiteController extends AppController
{  
    // public $base_url;
    public $paginate = [
        'limit' => 6,];

   public function initialize() : void
   {

    parent::initialize();
    // $this->base_url= Router::url("bookpg",true);
    $this->viewBuilder()->setLayout('websitelayout');
    $this->loadComponent('Paginator');

   }

	public function guest()
	{
		$this->set("title", "Paying_Guest");

	}
	public function home($id = null)
	{
		$this->set("title", "PG website");
        $this->loadModel('Pgdetails');
        $this->loadModel('Rooms');
        $this->loadModel('Users');
    
		$room =$this->paginate( $this->Rooms->find('all' ,[
            'contain' => ['Pgdetails'],
        ]));
    
        $this->set('rooms', $room);
	}

    public function search()
    {
        $this->loadModel('Pgdetails');
        $this->loadModel('Rooms');
        $this->loadModel('Users');
        // $room = $this->Rooms->get($id,[
        //     'contain' => [],
        // ]);

        $this->request->allowMethod('ajax');
   
        $keyword = $this->request->getQueryParams('keyword');

        $query = $this->Rooms->find('all',[
              // 'contain' => ['Pgdetails'],
              'conditions' => ['ac LIKE'=>'%'.$keyword['keyword'].'%']
              // 'order' => ['Users.user_id'=>'DESC'],
              // 'limit' => 10
        ]);

        $this->set('rooms', $this->paginate($query));
        $this->set('_serialize', ['rooms']);

    }

     public function register()
    {
     $this->loadModel('Users');
     $this->loadModel('Userroles');

        # Set Page Title
        // $this->set('title', 'User Registration');

        $users = $this->Users->newEntity($this->request->getData());
        if ($this->request->is('post'))
        {
            if (empty($users->getErrors()))
            {
                $users = $this->Users->patchEntity($users, $this->request->getData());
                
                # Set Data in Table
                // $users->is_active = 1;
    
                # Save Data

                $image = $this->request->getData('image_file');

                    $name  = $image->getClientFilename();

                    if( !is_dir(WWW_ROOT.'img'.DS.'user-img') )
                    mkdir(WWW_ROOT.'img'.DS.'user-img',0775);
                
                     $targetPath = WWW_ROOT.'img'.DS.$name;

                    if($name)
                    $image->moveTo($targetPath);
                
                    $users->image = 'user-img/'.$name;

                if ($this->Users->save($users)) {
                    $this->Flash->success(__('User has been saved.'));
                    return $this->redirect(['controller'=>'Users','action' => 'login']);
                }
                $this->Flash->error(__('Unable to add your user.'));
            }

        }
        $roles = $this->Userroles->find('list', [ 
              'keyField' => 'id',
              'valueField' => 'user_rolename'
            ]);
          $this->set('roles', $roles);
        // Set this errors in fields
        $this->set('users', $users);
     }


     public function viewpg($id = null)
    {
        $this->set("title", "View PG Rooms");
        $this->loadModel('Pgdetails');
        $this->loadModel('Rooms');
        $this->loadModel('Users');

        $room = $this->Rooms->get($id,[
            'contain' => ['Pgdetails'],
        ]);

         $pgdetail = $this->Pgdetails->find('all',[
            'contain' => ['Users'],
        ]);
         
        $this->set('room', $room);
        $this->set('pgdetail', $pgdetail);

    }


         public function about($id = null)
        {
             $this->set("title", "About PG");
             $this->loadModel('Pgdetails');
             $this->loadModel('Rooms');

                $room = $this->Rooms->get($id, [
                'contain' => ['Pgdetails'],
                ]);

            $this->set('room', $room);
        }


	public function userprofile($id=null)
	{
        $this->set("title", "Edit Profile");
        $this->loadModel('Users');
        $this->loadModel('Userroles');
         $user = $this->Users->get($this->getRequest()->getSession()->read('Auth.user_id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            //  if (!$user->getErrors) {
            //     $image = $this->request->getData('image');
  
            //     $name  = $image->getClientFilename();
                
            //     if ($name){
            //         if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
            //             mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

            //         $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;


            //         $image->moveTo($targetPath);

            //         $imgpath = WWW_ROOT . 'img' . DS . $user->image;
            //         if (file_exists($imgpath)) {
            //             unlink($imgpath);
            //         }
                    
            //         $user->image = 'user-img/' . $name;
            //     }        
            // }

            if ($this->Users->save($user)) {
           
                $this->Flash->success(__('updated'));

                return $this->redirect(['action' => 'userprofile']);
            }
            $this->Flash->error(__('Not update. Please, try again.'));
        }
        $this->set(compact('user'));
         
	}
    public function contactus()
    {
        $this->set("title", "Contact us");

    }

     public function bookpg($id = null)
    {
        $this->set("title", "Book PG");
        $this->loadModel('Users');
        $this->loadModel('Bookings');
        $this->loadModel('Pgdetails');
        $this->loadModel('Rooms');

 $room = $this->Rooms->get($id, [
            'contain' => ['Pgdetails'],
        ]);
        $book = $this->Bookings->newEmptyEntity();
            if ($this->request->is('post')) {
            $book = $this->Bookings->newEntity($this->request->getData());
              
            $myemail = $this->getRequest()->getSession()->read('Auth.email');
            $mailer = new Mailer('default');

$mailer=$mailer->setTransport('gmail')
               ->setEmailFormat('html')
               ->setFrom(['reetuthakur.zapbuild@gmail.com' => 'PG Booking'])
               ->setTo($myemail)
               ->setSubject('PG Booked')
               ->deliver('Thanks for PG booking....Your Pg has been booked');

            if ($this->Bookings->save($book)) {

                $this->Flash->success(__('PG Booked.'));

                return $this->redirect(['action' => 'payment','controller'=>'Website',$id]);
            }
            $this->Flash->error(__('Not booked. Please, try again.'));
        }
        
       $this->set(compact('room'));
       $this->set('books',$book);

    }

    public function payment($id = null)
    {
        $this->set("title", "Payment");
        $this->loadModel('Users');
        $this->loadModel('Bookings');
        $this->loadModel('Pgdetails');
        $this->loadModel('Rooms');
        $this->loadModel('Payments');

 $room = $this->Rooms->get($id, [
            'contain' => ['Pgdetails'],
        ]);

        $payment = $this->Payments->newEmptyEntity();
            if ($this->request->is('post')) {
            $payment = $this->Payments->newEntity($this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('Your PG  is Booked now.'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('Not booked. Please, try again.'));
        }
        
        $this->set(compact('room'));

        $this->set('payments',$payment);

    }


	public function login()
	{
		  $this->set("title", "Login Page");
		 
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
            //regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) 
        {
        // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Website',
            'action' => 'home',
        ]);

             return $this->redirect($redirect);
        }
         // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
        }

    }
    
     public function beforeFilter(\Cake\Event\EventInterface $event)
    {
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login','register','guest','forgotpassword','resetpassword']);
    }
	   
	   public function logout()
		{
    		$result = $this->Authentication->getResult();
   			 // regardless of POST or GET, redirect if user is logged in
    		if ($result->isValid()) 
    		{
        		$this->Authentication->logout();
        		return $this->redirect(['controller' => 'Website', 'action' => 'login']);
    		}
		}

}
