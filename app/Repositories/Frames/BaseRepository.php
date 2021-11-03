<?php

namespace App\Repositories\Frames;

use App\Repositories\Frames\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    //Model muốn tương tác
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    //Lấy Model tương ứng
    abstract public function getModel();

    /**
     *set Model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if($result){
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id): bool
    {
        $result = $this->find($id);
        if($result){
            $result->delete();

            return true;
        }

        return false;
    }
}
