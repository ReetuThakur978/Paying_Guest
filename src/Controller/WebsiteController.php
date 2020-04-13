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

		$room = $this->Rooms->find('all');
        
        $details = $this->Pgdetails->find('list', [ 
                'keyField' => 'pg_id',
                'valueField' => 'location'
                ]);

            $this->set('details', $details);

        $this->set('rooms', $room);

	}
	public function userprofile()
	{
        $this->set("title", "Edit Profile");
        // $user = $this->Users->newEntity();
        // if ($this->request->is('post')) {
        //     // $room = $this->Rooms->patchEntity($room, $this->request->getData());
        //     $myname= $this->request->getData()['file']['image'];
        //     $mytmp= $this->request->getData()['file']['tmp_name'];
        //     $file=$this->Users->newEntity();
        //     $file->image=$myname;
        //     if(move_uploaded_file($mytmp, $myname)){
        //         $this->Users->save($file);
        //         return $this->redirect(['action'=>'userprofile']);
        //     }
        // }
         
	}
    public function contactus()
    {
        $this->set("title", "Contact us");

    }


	public function login()
	{
		  $this->set("title", "Login Page");
		 // $this->loadmodel('Users');
                 //      $user = $this->Users->find('all');
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
