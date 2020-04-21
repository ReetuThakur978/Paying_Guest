<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;
// use App\Controller\AppController;
// use cake\Routing\Router;

class WebsiteController extends AppController
{  
    // public $base_url;

   public function initialize() : void
   {

    parent::initialize();
    // $this->base_url= Router::url("bookpg",true);
    $this->viewBuilder()->setLayout('guestlayout');

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
    
		$room = $this->Rooms->find('all' ,[
            'contain' => ['Pgdetails'],
        ]);
    
        $this->set('rooms', $room);
	}

    public function search()
    {
        $this->loadModel('Pgdetails');
        $this->loadModel('Rooms');
        $this->loadModel('Users');

        $this->request->allowMethod('ajax');
   
        $keyword = $this->request->getQueryParams('keyword');

        $query = $this->Rooms->find('all',[
              'contain' => ['Pgdetails'],
              'conditions' => ['ac LIKE'=>'%'.$keyword['keyword'].'%']
              // 'order' => ['Users.user_id'=>'DESC'],
              // 'limit' => 10
        ]);

        $this->set('users', $this->paginate($query));
        $this->set('_serialize', ['users']);

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
        $this->set('room', $room);
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

         $user = $this->Users->get($this->getRequest()->getSession()->read('Auth.user_id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
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

     public function bookpg()
    {
        $this->set("title", "Book PG");
        // $this->loadModel('Pgdetails');
        // $this->loadModel('Rooms');
        $this->loadModel('Users');
        $this->loadModel('Bookings');

        $book = $this->Bookings->newEmptyEntity();
            if ($this->request->is('post')) {
            $book = $this->Bookings->newEntity($this->request->getData());

            if ($this->Bookings->save($booking)) {
                $this->Flash->success(__('PG Booked.'));

                return $this->redirect(['action' => 'payment']);
            }
            $this->Flash->error(__('Not booked. Please, try again.'));

            // echo "hello";
            // exit;

            $this->set('book',$book);
        }

    }

    public function payment()
    {
        $this->set("title", "Payment");

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
