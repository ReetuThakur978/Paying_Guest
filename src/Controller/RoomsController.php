<?php
declare(strict_types=1);

namespace App\Controller;


class RoomsController extends AppController
{
    
    public function index()
    {
        $this->set("title", "Room available");
        $this->paginate = [
            'contain' => ['Pgdetails'],
        ];
        $rooms = $this->paginate($this->Rooms);

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
            // $room = $this->Rooms->patchEntity($room, $this->request->getData());
            $imgdata= $this->request->getData('image');
            $tem= $imgdata->getStream()->getMetadata('uri');
            $img=file_get_contents($tem);
            $num['pg_id']=$this->request->getData('pg_id');
            $num['ac_noac']=$this->request->getData('ac_noac');
            $num['seater']=$this->request->getData('seater');
            $num['rent']=$this->request->getData('rent');
            $num['with_or_without_food']=$this->request->getData('with_or_without_food');
            $num['security_charge']=$this->request->getData('security_charge');
            $num['notic_period']=$this->request->getData('notic_period');
            $num['seates_available']=$this->request->getData('seates_available');
            $num['status']=$this->request->getData('status'); 
            $num['image']=$img;

                $room = $this->Rooms->newEntity($num);

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
        $room = $this->Rooms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
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
}
