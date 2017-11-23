<?php

namespace App\Repositories;

use App\Signature;

class SignatureRepository implements Repository
{
    /**
     * @var Signature
     */
    protected $model;

    /**
     * ArticleRepository constructor.
     *
     * @param Signature $model
     */
    public function __construct(Signature $model)
    {
        $this->model = $model;
    }

    /**
     * Get all tasks.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Ignore flagged signatures.
     *
     * @return mixed
     */
    public function ignoreFlagged()
    {
        return $this->model->where('flagged_at', null);
    }

    /**
     * Get all items in page.
     *
     * @param $countOnPage
     *
     * @return mixed
     */
    public function paginate($countOnPage)
    {
        return $this->model->paginate($countOnPage);
    }

    /**
     * Get task by Id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Create new task.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update task by Id.
     *
     * @param int $id
     * @param array $attributes
     *
     * @return mixed
     */
    public function update(int $id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Delete task by Id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
}