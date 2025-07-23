<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Http\Controllers;

use App\CRM\Application\Services\OrderItemsService;
use App\CRM\Domain\Core\Contracts\OrderItemsContract;
use App\CRM\Infrastructure\Http\Requests\OrderItemsRequest;
use App\Http\Controllers\Controller;

class OrderItemsController extends Controller
{
    public function __construct(
        private readonly OrderItemsContract $orderItemsService
    )
    {
    }

    public function add(OrderItemsRequest $request)
    {
        $dto = $request->getDto();

        $this->orderItemsService->add($dto);
    }
}