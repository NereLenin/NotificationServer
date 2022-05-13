<?php namespace App\Controllers;

use App\Models\NotificationModel;

class Notification extends BaseController

{
 public function index() //Обображение всех записей
 {
     if (!$this->ionAuth->loggedIn())
     {
         return redirect()->to('/auth/login');
     }

   $model = new NotificationModel();
   $data ['notification'] = $model->getNotification();
   echo view('notifications/view_all', $this->withIon($data));
 }
    public function view($id = null) //отображение одной записи
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new NotificationModel();
        $data ['notification'] = $model->getNotification($id);
        echo view('notifications/view', $this->withIon($data));
    }

    public function create()
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        helper(['form']);
        $data ['validation'] = \Config\Services::validation();
        echo view('notifications/create', $this->withIon($data));
    }

    public function store()
    {
        helper(['form','url']);

        if ($this->request->getMethod() === 'post' && $this->validate([
                'text' => 'required|min_length[3]|max_length[1000]',
                'time'  => 'required'
            ]))
        {
            $model = new NotificationModel();
            $model->save([
                'text' => $this->request->getPost('text'),
                'time' => $this->request->getPost('time'),
            ]);
            session()->setFlashdata('message', "Уведомление успешно добавленно");
            return redirect()->to('/notification');
        }
        else
        {
            return redirect()->to('/notification/create')->withInput();
        }
    }

    public function edit($id)
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new NotificationModel();

        helper(['form']);
        $data ['notification'] = $model->getNotification($id);
        $data ['validation'] = \Config\Services::validation();
        echo view('notifications/edit', $this->withIon($data));

    }

    public function update()
    {
        helper(['form','url']);
        echo '/notification/edit/'.$this->request->getPost('id');
        if ($this->request->getMethod() === 'post' && $this->validate([
                'id'  => 'required',
                'text' => 'required|min_length[3]|max_length[1000]',
                'time'  => 'required'
            ]))
        {
            $model = new NotificationModel();
            $model->save([
                'id' => $this->request->getPost('id'),
                'text' => $this->request->getPost('text'),
                'time' => $this->request->getPost('time'),
            ]);
            //session()->setFlashdata('message', lang('Curating.rating_update_success'));

            return redirect()->to('/notification');
        }
        else
        {
            return redirect()->to('/notification/edit/'.$this->request->getPost('id'))->withInput();
        }
    }

    public function delete($id)
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new NotificationModel();
        $model->delete($id);
        return redirect()->to('/notification');
    }



}
