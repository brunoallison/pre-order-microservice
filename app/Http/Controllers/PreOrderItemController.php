<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Repositories\PreOrderItemRepository;

class PreOrderItemController extends Controller
{
    use ApiResponser;

    private $preOrderItemRepository;

    /**
     * PreOrderItemController constructor.
     *
     * @param PreOrderItemRepository $preOrderItemRepository
     */
    public function __construct(PreOrderItemRepository $preOrderItemRepository)
    {
        $this->preOrderItemRepository = $preOrderItemRepository;
    }

    public function index()
    {
        $preOrderItems = $this->preOrderItemRepository->all();

        return $this->successResponse($preOrderItems);
    }

    public function show($id)
    {
        $preOrderItem = $this->preOrderItemRepository->find($id);

        return $this->successResponse($preOrderItem);
    }

    public function store(Request $request)
    {
        $preOrderItem = $this->preOrderItemRepository->create($request->all());

        return $this->successResponse($preOrderItem);
    }

    public function update(Request $request, $id)
    {
        $preOrderItem = $this->preOrderItemRepository->update($request->all(), $id);

        return $this->successResponse($preOrderItem);
    }

    public function destroy($id)
    {
        $preOrderItem = $this->preOrderItemRepository->delete($id);

        return $this->successResponse($preOrderItem);
    }
}
