<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Repositories\PreOrderRepository;

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

    public function show($id)
    {
        $preOrder = $this->preOrderRepository->find($id);

        return $this->successResponse($preOrder);
    }

    public function store(Request $request)
    {
        $preOrder = $this->preOrderRepository->create($request->all());

        return $this->successResponse($preOrder);
    }

    public function update(Request $request, $id)
    {
        $preOrder = $this->preOrderRepository->update($request->all(), $id);

        return $this->successResponse($preOrder);
    }

    public function destroy($id)
    {
        $preOrder = $this->preOrderRepository->delete($id);

        return $this->successResponse($preOrder);
    }

}
