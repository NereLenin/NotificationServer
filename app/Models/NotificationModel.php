<?php namespace App\Models;
use CodeIgniter\Model;
class NotificationModel extends Model
{
    protected $table = 'notifications'; //таблица, связанная с моделью
    protected $allowedFields = ['text', 'time'];

    public function getNotification($id = null)
    {
        if (!isset($id)) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

}
