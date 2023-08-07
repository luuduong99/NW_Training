<?php

namespace App\Repositories;

use Illuminate\Support\Facades\App;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = App::make(
            $this->getModel()
        );
    }

    public function all()
    {
        return $this->model->get();
    }

    public function getAll()
    {
        return $this->model->paginate(5);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();
            return $result;
        }
        return false;
    }
}
