<?php

namespace App\Controllers;

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
        $oauth = new OAuth();
        if ($oauth->isLoggedIn()) {
            return $this->respond($this->model->getNotification());

        }
        $oauth->server->getResponse()->send();
    }

}

