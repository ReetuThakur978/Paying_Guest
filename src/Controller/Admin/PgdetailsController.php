<?php
declare(strict_types=1);

// namespace App\Controller;
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;



class PgdetailsController extends AppController
{
    
    public function index()
    {
        $this->set("title", "PG owner");
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

    
    public function view($id = null)
    {
        $this->set("title", "View PG owner");
        $pgdetail = $this->Pgdetails->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('pgdetail', $pgdetail);
    }

    
    public function add()
    {
        $this->set("title", "Add PG owner");
        $pgdetail = $this->Pgdetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $pgdetail = $this->Pgdetails->patchEntity($pgdetail, $this->request->getData());
            if ($this->Pgdetails->save($pgdetail)) {
                $this->Flash->success(__('The pgdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pgdetail could not be saved. Please, try again.'));
        }
        // $users = $this->Pgdetails->Users->find('list', ['limit' => 200]);
        $users = $this->Pgdetails->Users->find('list', [ 
                'keyField' => 'user_id',
                'valueField' => 'firstname'
                ]);
        $this->set(compact('pgdetail', 'users'));
    }

    
    public function edit($id = null)
    {
        $this->set("title", "Edit PG owner");
        $pgdetail = $this->Pgdetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pgdetail = $this->Pgdetails->patchEntity($pgdetail, $this->request->getData());
            if ($this->Pgdetails->save($pgdetail)) {
                $this->Flash->success(__('The pgdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pgdetail could not be saved. Please, try again.'));
        }
        $users = $this->Pgdetails->Users->find('list', ['limit' => 200]);
        $this->set(compact('pgdetail', 'users'));
    }

    
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $pgdetail = $this->Pgdetails->get($id);
    //     if ($this->Pgdetails->delete($pgdetail)) {
    //         $this->Flash->success(__('The pgdetail has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The pgdetail could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function userStatus($id=null,$status)
{
    $this->request->allowMethod(['post']);
    $pgdetail=$this->Pgdetails->get($id);

    if($status == 1)
        $pgdetail->status = 0;
    else
       $pgdetail->status = 1; 

   if($this->Pgdetails->save($pgdetail))
   {
    // $this->Flash->success(__('The status has been changed'));
    return $this->redirect(['action'=>'index']);
   }
  
}
}
