<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;


class PgownerController extends AppController
{ 
	public function initialize() : void
	{
		parent::initialize();
		$this->loadComponent('Paginator');
	}

 public function mypg()
 {
 	$this->loadModel('Users');
 	$this->loadModel('Userroles');
 	$this->set("title", "My PGs");

    $users = $this->paginate($this->Users);
    $this->set(compact('users'));       

 }

  public function view($id = null)
    {
    	$this->set("title", "View your PG");
    	$this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

   public function pgedit($id = null)
    {
    	$this->loadModel('Users');
        $this->set("title", "Edit Users");
    	$this->loadModel('Userroles');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile is updated'));

                return $this->redirect(['action' => 'mypg']);
            }
            $this->Flash->error(__('Not Update. Please, try again.'));
        }
        // $roles = $this->Userroles->find('list', [ 
        //     'keyField' => 'id',
        //     'valueField' => 'user_rolename'
        // ]);
        // $this->set('roles', $roles);
        $this->set(compact('user'));
    } 
  public function transient()
  {
  	$this->set("title", "Transient Guest");
  	$this->loadModel('Users');
 	$this->loadModel('Userroles');
 	

    $users = $this->paginate($this->Users);
    $this->set(compact('users'));       

  }  

  public function userStatus($id=null,$status)
{
	$this->loadModel('Users');
    $this->request->allowMethod(['post']);
    $user=$this->Users->get($id);

    if($status == 1)
        $user->status = 0;
    else
       $user->status = 1; 

   if($this->Users->save($user))
   {
    // $this->Flash->success(__('The status has been changed'));
    return $this->redirect(['action'=>'mypg']);
   }
   // return $this->redirect(['action'=>'index']);
    
}  
}
