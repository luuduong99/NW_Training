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

    public function getAll()
    {
        return $this->model->get();
    }

    public function pagination()
    {
        return $this->model->orderBy('id', 'desc')->paginate(5);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->model->findOrFail($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->model->findOrFail($id);
        if ($result) {
            $result->delete();
            return $result;
        }
        return false;
    }
}
