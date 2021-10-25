<?php

namespace App\Http\Utilities\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait BaseOperationsTrait
{
    /**
     * Get all records from the database.
     *
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     *
     * @return array
     */
    public function all(array $columns = ['*'], string $orderBy = 'id', string $sortBy = 'asc'): array
    {
        $result = $this->model->select($columns)->orderBy($orderBy, $sortBy)->get();

        return $this->toArray($result);
    }

    /**
     * Get paginated records from the database.
     *
     * @param int $perPage
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     *
     * @return array
     */
    public function paginate(
        int    $perPage = 15,
        array  $columns = ['*'],
        string $orderBy = 'id',
        string $sortBy = 'desc'
    ): array
    {
        $result = $this->model->select($columns)->orderBy($orderBy, $sortBy)->paginate($perPage);

        return $this->toArray($result);
    }

    /**
     * Find all matching records by the given data.
     *
     * @param array $data
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     *
     * @return array
     */
    public function findBy(
        array  $data,
        array  $columns = ['*'],
        string $orderBy = 'id',
        string $sortBy = 'desc'
    ): array
    {
        $result = $this->model->select($columns)->where($data)->orderBy($orderBy, $sortBy)->get();

        return $this->toArray($result);
    }

    /**
     * Find and paginated all matching records by the given data.
     *
     * @param array $data
     * @param int $perPage
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     *
     * @return LengthAwarePaginator
     */
    public function paginateBy(
        array  $data,
        int    $perPage = 15,
        array  $columns = ['*'],
        string $orderBy = 'id',
        string $sortBy = 'desc'
    ): LengthAwarePaginator
    {
        return $this->model->select($columns)->where($data)->orderBy($orderBy, $sortBy)->paginate($perPage);
    }

    /**
     * Find a record for the given id.
     *
     * @param int $id
     * @param array $columns
     * @return array
     */
    public function find(int $id, array $columns = ['*']): array
    {
        $result = $this->model->find($id, $columns);

        return $this->toArray($result);
    }

    /**
     * Find a record by the given data.
     *
     * @param array $data
     * @param array $columns
     * @return array
     */
    public function findOneBy(array $data, array $columns = ['*']): array
    {
        $result = $this->model->select($columns)->where($data)->first();

        return $this->toArray($result);
    }

    /**
     * Find a record for the given id or throw a not found exception.
     *
     * @param int $id
     * @param array $columns
     * @return array
     *
     */
    public function findOneOrFail(int $id, array $columns = ['*']): array
    {
        $result = $this->model->findOrFail($id, $columns);

        return $this->toArray($result);
    }

    /**
     * Find a record by the given data or throw a not found exception.
     *
     * @param array $data
     * @param array $columns
     * @return array
     *
     */
    public function findOneByOrFail(array $data, array $columns = ['*']): array
    {
        $result = $this->model->select($columns)->where($data)->firstOrFail();

        return $this->toArray($result);
    }

    /**
     * Create a new record.
     *
     * @param array $data
     *
     * @return array
     */
    public function create(array $data): array
    {
        $result = $this->model->create($data);

        return $this->toArray($result);
    }

    /**
     * Create multi-record.
     *
     * @param array $data
     *
     * @return bool
     */
    public function insert(array $data): bool
    {
        return $this->model->insert($data);
    }

    /**
     * Update the given model.
     *
     * @param int $id
     * @param array $data
     * @param boolean $checkIsClean
     *
     * @return boolean
     */
    public function update(int $id, array $data, bool $checkIsClean = true): bool
    {
        $model = $this->model->findOrFail($id);

        $model = $model->fill($data);

        if ($model->isClean() && $checkIsClean) {
            return false;
        }

        return (bool)$model->save();
    }

    /**
     * Delete the given model.
     *
     * @param int $id
     *
     * @return bool
     */
    public function delete(int $id): bool
    {
        $model = $this->model->findOrFail($id);

        return (bool)$model->delete();
    }

    /**
     * Convert the given object to array.
     *
     * @param $result
     *
     * @return array
     */
    public function toArray($result): array
    {
        return (is_null($result)) ? [] : $result->toArray();
    }
}
