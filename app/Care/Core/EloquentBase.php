<?php
namespace Care\Core;

use Illuminate\Database\Eloquent\Model;

abstract class EloquentBase
{
    protected $model;

    function __construct($model = null)
    {
        $this->model = $model;
    }

    /**
     * Retrieve current instance
     * @return $model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set model
     * @param $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all model data
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Retrieve model data paginated
     * @param $count
     * @return mixed
     */
    public function getAllPaginated($count = 10)
    {
        return $this->model->paginate($count);
    }

    /**
     * Retrieve data by id
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Get a new instance of model
     * @param array $attributes
     * @return mixed
     */
    public function getNew($attributes = array())
    {
        return $this->model->newInstance($attributes);
    }

    /**
     * Save model data
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        if ($data instanceOf Model) {
            return $this->storeEloquentModel($data);
        } elseif (is_array($data)) {
            return $this->storeArray($data);
        }
    }

    /**
     * Helper function for saving model
     * @param $model
     * @return mixed
     */
    protected function storeEloquentModel($model)
    {
        if ($model->getDirty()) {
            return $model->save();
        } else {
            return $model->touch();
        }
    }

    /**
     * Helper function for saving model
     * @param $data
     * @return mixed
     */
    protected function storeArray($data)
    {
        $model = $this->getNew($data);
        return $this->storeEloquentModel($model);
    }
} 