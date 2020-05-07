<?php
declare(strict_types=1);

namespace App\Controller;
// use Cake\Validation\Validator;


class PgownerController extends AppController
{ 
	public function initialize() : void
	{
		parent::initialize();
         $this->viewBuilder()->setLayout('pgownerlayout');
		$this->loadComponent('Paginator');
	}

 public function viewprofile()
 {
 	$this->loadModel('Users');
 	$this->loadModel('Userroles');
 	$this->set("title", "My Profile");

    $users = $this->paginate($this->Users);
    $this->set(compact('users'));       

 }

 	public function mypg()
    {
    	$this->loadModel('Pgdetails');
		$this->loadModel('Users');
        $this->set("title", "My PGs");
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->Pgdetails->findByLocation($key);
        }else{
            $query = $this->Pgdetails;
        }

        $this->paginate = [
            'contain' => ['Users'],
        ];
        $pgdetails = $this->paginate($query);

        $this->set(compact('pgdetails'));



    }

    public function mypgview($id = null)
    {
    	$this->loadModel('Pgdetails');
		$this->loadModel('Users');
        $this->set("title", "View PG ");
        $pgdetail = $this->Pgdetails->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('pgdetail', $pgdetail);
    }

     public function mypgedit($id = null)
    {
        $this->set("title", "Edit PG ");
        $this->loadModel('Pgdetails');
		$this->loadModel('Users');
        $pgdetail = $this->Pgdetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pgdetail = $this->Pgdetails->patchEntity($pgdetail, $this->request->getData());
            if ($this->Pgdetails->save($pgdetail)) {
                $this->Flash->success(__('Saved Edition.'));

                return $this->redirect(['action' => 'mypg']);
            }
            $this->Flash->error(__('Not saved. Please, try again.'));
        }
        $users = $this->Pgdetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('pgdetail', 'users'));
    }


  public function view($id = null)
    {
    	$this->set("title", "View Profile");
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
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

             if (!$user->getErrors) {
                $image = $this->request->getData('change_image');
  
                $name  = $image->getClientFilename();
                
                if ($name){
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;


                    $image->moveTo($targetPath);

                    $imgpath = WWW_ROOT . 'img' . DS . $user->image;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }
                    
                    $user->image = 'user-img/' . $name;
                }

                
            }


            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile is updated'));

                return $this->redirect(['action' => 'mypg']);
            }
            $this->Flash->error(__('Not Update. Please, try again.'));
        }
        
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


  public function roomavailable()
    {
    	$this->loadModel('Pgdetails');
		$this->loadModel('Users');
        $this->set("title", "Room available");
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->Pgdetails->findByLocation($key);
        }else{
            $query = $this->Pgdetails;
        }

        $this->paginate = [
            'contain' => ['Users'],
        ];
        $pgdetails = $this->paginate($query);

        $this->set(compact('pgdetails'));
         
    } 

    public function viewroom($id = null)
    {
    	$this->loadModel('Pgdetails');
		$this->loadModel('Users');
        $this->set("title", " Room View");
        $pgdetail = $this->Pgdetails->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('pgdetail', $pgdetail);
    }

  public function userStatus($id=null,$status)
{
	$this->loadModel('Pgdetails');
    $this->request->allowMethod(['post']);
    $user=$this->Pgdetails->get($id);

    if($status == 1)
        $user->status = 0;
    else
       $user->status = 1; 

   if($this->Pgdetails->save($user))
   {
    // $this->Flash->success(__('The status has been changed'));
    return $this->redirect(['action'=>'mypg']);
   }
   // return $this->redirect(['action'=>'index']);
    
}  

	  public function transientStatus($id=null,$status)
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
    	return $this->redirect(['action'=>'transient']);
   	}
   // return $this->redirect(['action'=>'index']);
    
	} 

	public function addnewpg()
	{
		$this->set("title", "Add new PG");
		$this->loadModel('Pgdetails');
		$this->loadModel('Users');
        $pgdetail = $this->Pgdetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $pgdetail = $this->Pgdetails->patchEntity($pgdetail, $this->request->getData());
            if ($this->Pgdetails->save($pgdetail)) {
                $this->Flash->success(__('The pgdetail has been saved.'));

                return $this->redirect(['action' => 'mypg']);
            }
            $this->Flash->error(__('The pgdetail could not be saved. Please, try again.'));
        }
        // $users = $this->Pgdetails->Users->find('list', ['limit' => 200]);
        $users = $this->Pgdetails->Users->find('list', [ 
            	'keyField' => 'user_id',
           		'valueField' => 'firstname'
        		]);
        	// $this->set('roles', $roles);
        


        $this->set(compact('pgdetail', 'users'));
	} 
}
