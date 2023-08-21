<?php

namespace App\Repositories;

use App\Enums\Page;
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

    public function pagination($relationships = [])
    {
        $query = $this->model->orderBy('id', 'desc');

        foreach ($relationships as $relationship) {
            $query->with($relationship);
        }

        return $query->paginate(Page::page);
//        return $this->model->orderBy('id', 'desc')->paginate(Page::page);
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
