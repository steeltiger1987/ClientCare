<?php
namespace Care\Repositories;

interface UsersRepositoryInterface
{
    /**
     * Find user by email
     * @param $email
     * @return mixed
     */
    public function findByEmail($email);

    /**
     * Get all users of type client
     * @return mixed
     */
    public function getClients();

    /**
     * Update specific user
     * @param       $id
     * @param array $data
     * @return mixed
     */
    public function updateUser($id, array $data);
}