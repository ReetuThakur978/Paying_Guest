<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;


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

        	$this->set(compact('user'));
    }

    
    public function edit($id = null)
    {
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

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function home()
    {

    }
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
    $this->Authentication->addUnauthenticatedActions(['login','register']);
}

public function login() {
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
}
