<?php

namespace App\Http\Controllers;
use App\Repositories\PreOrderRepository;
use App\Traits\ApiResponser;

class PreOrderController extends Controller
{
    use ApiResponser;

    private $preOrderRepository;

    /**
     * PreOrderController constructor.
     *
     * @param PreOrderRepository $preOrderRepository
     */
    public function __construct(PreOrderRepository $preOrderRepository)
    {
        $this->preOrderRepository = $preOrderRepository;
    }

    public function index()
    {
        $preOrders = $this->preOrderRepository->all();

        return $this->successResponse($preOrders);
    }

}
