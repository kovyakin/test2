<?php

namespace App\CRM\Infrastructure\Http\Controllers;

use App\CRM\Infrastructure\Http\Requests\OrderFilterRequest;
use App\CRM\Infrastructure\Http\Resources\OrderFilteredResource;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public function __construct(
        private readonly OrderFilterRequest $orderFilterRequest
    ) {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        //todo исправить пагинацию
        $orders = $this->orderFilterRequest->status('active')->paginate(12)->get();

        return OrderFilteredResource::collection($orders);
    }
}
