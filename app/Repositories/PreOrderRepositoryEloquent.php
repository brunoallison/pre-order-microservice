<?php

namespace App\Repositories;

use App\Models\PreOrder;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PreOrderRepositoryEloquent
 *
 * @package App\Repositories
 */
class PreOrderRepositoryEloquent extends BaseRepository implements PreOrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PreOrder::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
