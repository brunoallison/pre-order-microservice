<?php

namespace App\Repositories;

use App\Models\PreOrderItem;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PreOrderItemRepositoryEloquent
 *
 * @package App\Repositories
 */
class PreOrderItemRepositoryEloquent extends BaseRepository implements PreOrderItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PreOrderItem::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
