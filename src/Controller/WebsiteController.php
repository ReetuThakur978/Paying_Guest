<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;


class WebsiteController extends AppController
{  
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

		$room = $this->Rooms->find('all');
        
        // $details = $this->Pgdetails->find('list', [ 
        //         'keyField' => 'pg_id',
        //         'valueField' => 'location'
        //         ]);

// echo $room;
//         exit;

            // $this->set('details', $details);
        $details = $this->Pgdetails->find('all');

        $this->set('details', $details);


        $this->set('rooms', $room);

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
