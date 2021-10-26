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
        int $perPage = 15,
        array $columns = ['*'],
        string $orderBy = 'id',
        string $sortBy = 'desc'
    ): array
    {
        $result = $this->model->select($columns)->orderBy($orderBy, $sortBy)->paginate($perPage);

        return $this->toArray($result);
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
