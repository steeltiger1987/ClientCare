<?php
namespace Care\Repositories\Eloquent;

use Care\Core\EloquentBase;
use Care\Repositories\UsersRepositoryInterface;
use Care\User;

class UsersRepository extends EloquentBase implements UsersRepositoryInterface
{
    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->where('email', '=', $email)->first();
    }

    public function getClients()
    {
        return $this->model->clients()->get();
    }

    /**
     * Update specific user
     * @param       $id
     * @param array $data
     * @return mixed
     */
    public function updateUser($id, array $data)
    {
        $user = $this->getById($id);

        if (!empty($data['password'])) {
            $user->password = $data['password'];
        }

        if(isset($data['name'])) {
            $user->name = $data['name'];
        }

        if(isset($data['status'])) {
            $user->active = $data['status'];
        }

        if(isset($data['email'])) {
            $user->email = $data['email'];
        }

        if(isset($data['phone'])) {
            $user->phone = $data['phone'];
        }

        $user->save();

    }
}