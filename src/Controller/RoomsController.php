<?php
declare(strict_types=1);

namespace App\Controller;


class RoomsController extends AppController
{
    
    public function index()
    {
        $this->set("title", "Room available");
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->Rooms->findByRentOrSeater($key,$key);
        }else{
            $query = $this->Rooms;
        }
        $this->paginate = [
            'contain' => ['Pgdetails'],
        ];
       
        $rooms = $this->paginate($query);
        $this->set(compact('rooms'));
    }

   
    public function view($id = null)
    {
        $this->set("title", "View Room available");
        $room = $this->Rooms->get($id, [
            'contain' => ['Pgdetails'],
        ]);

        $this->set('room', $room);
    }

    
    public function add()
    {
        $this->set("title", "Add Room available");
        $room = $this->Rooms->newEmptyEntity();
        if ($this->request->is('post')) {
            

            $room = $this->Rooms->patchEntity($room, $this->request->getData());

            if(!$room->getErrors){
                    $image = $this->request->getData('image_file');

                    $name  = $image->getClientFilename();

                    if( !is_dir(WWW_ROOT.'img'.DS.'pg-img') )
                mkdir(WWW_ROOT.'img'.DS.'pg-img',0775);
                
                $targetPath = WWW_ROOT.'img'.DS.'pg-img'.DS.$name;

                    if($name)
                    $image->moveTo($targetPath);
                
                    $room->image = 'pg-img/'.$name;
                }

            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pgdetails = $this->Rooms->Pgdetails->find('list', ['limit' => 200]);
        $this->set(compact('room', 'pgdetails'));
    }

    
    public function edit($id = null)
    {
        $this->set("title", "Edit Room available");
        $room = $this->Rooms->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());


            if (!$room->getErrors) {
                $image = $this->request->getData('change_image');
  
                $name  = $image->getClientFilename();
                
                if ($name){
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'pg-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'pg-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'pg-img' . DS . $name;


                    $image->moveTo($targetPath);

                    $imgpath = WWW_ROOT . 'img' . DS . $room->image;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }
                    
                    $room->image = 'pg-img/' . $name;
                }

                
            }


            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $pgdetails = $this->Rooms->Pgdetails->find('list', ['limit' => 200]);
        $this->set(compact('room', 'pgdetails'));
    }

   
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $room = $this->Rooms->get($id);
    //     if ($this->Rooms->delete($room)) {
    //         $this->Flash->success(__('The room has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The room could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function userStatus($id=null,$status)
{
    $this->request->allowMethod(['post']);
    $room=$this->Rooms->get($id);

    if($status == 1)
        $room->status = 0;
    else
       $room->status = 1; 

   if($this->Rooms->save($room))
   {
    // $this->Flash->success(__('The status has been changed'));
    return $this->redirect(['action'=>'index']);
   }
  
}

}
