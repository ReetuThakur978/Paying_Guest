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
		// $user = $this->Users->get($id, [
  //           'contain' => [],
  //       ]);

  //       $this->set('user', $user);

	}
	public function userprofile()
	{

	}
	public function login()
	{
		 $this->set("title", "Login Page");
		 $this->loadmodel('Users');
        $user = $this->Users->find('all');
    // $this->request->allowMethod(['get', 'post']);
    // $result = $this->Authentication->getResult();
    // //regardless of POST or GET, redirect if user is logged in
    // if ($result->isValid()) {
    //     // redirect to /articles after login success
    //     $redirect = $this->request->getQuery('redirect', [
    //         'controller' => 'Website',
    //         'action' => 'home',
    //     ]);

    //     return $this->redirect($redirect);
    // }
     

        $this->set(compact('user'));

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
