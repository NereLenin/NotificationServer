<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use CodeIgniter\RESTful\ResourceController;
use App\Services\OAuth;
use OAuth2\Request;

class NotificationApi extends ResourceController
{
    protected $modelName = 'App\Models\NotificationModel';
    protected $format = 'json';
    protected $oauth;

    public function allNotifications() //Отображение всех записей
    {
        //$oauth = new OAuth();
       // if ($oauth->isLoggedIn()) {
            return $this->respond($this->model->getNotification());
        //}
        //$oauth->server->getResponse()->send();
    }

    public function createNotification()
    {
        $this->oauth = new OAuth();
        if ($this->oauth->isLoggedIn()) {
            $model = $this->model;
            if ($this->request->getMethod() === 'post' && $this->validate([
                    'text' => 'required|min_length[3]|max_length[1000]',
                    'time'  => 'required'
                ])) {
                //подготовка данных для модели
                $data = [
                    'id' => $this->request->getPost('id'),
                    'text' => $this->request->getPost('text'),
                    'time' => $this->request->getPost('time'),
                ];
                $model->save($data);
                return $this->respondCreated(null, 'Notification created');
            } else {
                return $this->respond($this->validator->getErrors());
            }
        } else $this->oauth->server->getResponse()->send();
    }
    public function deleteNotification($id = null)
    {
        $this->oauth = new OAuth();
        if ($this->oauth->isloggedIn()) {

            $model = new NotificationModel();
            $model->delete($id);
            return $this->respondDeleted(null, 'Notification deleted');
        }

        $this->oauth->server->getResponse()->send();
    }

}

