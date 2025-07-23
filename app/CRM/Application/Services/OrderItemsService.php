<?php

declare(strict_types=1);

namespace App\CRM\Application\Services;

use App\CRM\Application\Commands\CreateOrderItemsCommand;
use App\CRM\Application\DTOs\OrderItemDTO;
use App\CRM\Application\Exceptions\OrderItemException;
use App\CRM\Application\Handlers\OrderItemsHandler;
use App\CRM\Domain\Core\Contracts\OrderItemsContract;
use App\CRM\Domain\Core\Entities\OrderItems;
use App\CRM\Infrastructure\Eloquent\OrderItemsRepository;
use App\CRM\Infrastructure\Http\Requests\OrderItemsRequest;
use App\Traits\Loggable;

class OrderItemsService implements OrderItemsContract
{

    use Loggable;

    public function __construct(
        private readonly OrderItemsHandler $orderItemsHandler,
        private readonly OrderItemsRepository $orderItemsRepository
    ) {
    }

    /**
     * @throws \App\CRM\Application\Exceptions\OrderItemException
     */
    public function add(OrderItemDTO $dto): void
    {
        //todo add find product and find order!
        try {
            $command = new CreateOrderItemsCommand(
                null,
                $dto->order_id,
                $dto->product_id,
                $dto->count
            );

            $orderItem = $this->orderItemsHandler->__invoke($command);

            $this->orderItemsRepository->create($orderItem);
        } catch (\Throwable $exception) {
            $this->logError($exception);
            throw OrderItemException::errorAdd();
        }
    }

    public function update(OrderItemsRequest $orderItemsRequest): OrderItems
    {
        // TODO: Implement update() method.
    }
}