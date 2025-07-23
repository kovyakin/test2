<?php

namespace App\CRM\Infrastructure\Http\Controllers;

use App\CRM\Domain\Core\Contracts\OrderContract;
use App\CRM\Infrastructure\Http\Requests\OrderCreateRequest;
use App\CRM\Infrastructure\Http\Requests\OrderFilterRequest;
use App\CRM\Infrastructure\Http\Resources\OrderFilteredResource;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct(
        private readonly OrderFilterRequest $orderFilterRequest,
        private readonly OrderContract $orderService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //todo исправить пагинацию
        $orders = $this->orderFilterRequest->status('active')->paginate(12)->get();

        return OrderFilteredResource::collection($orders);
    }

    public function create(OrderCreateRequest $request)
    {
        $dto = $request->getDTO();

        $this->orderService->create($dto);

    }


}
