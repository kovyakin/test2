<?php

declare(strict_types=1);

namespace App\CRM\Application\Services;

use App\CRM\Application\Commands\CreateOrderCommand;
use App\CRM\Application\DTOs\OrderDTO;
use App\CRM\Application\Exceptions\OrderException;
use App\CRM\Application\Handlers\CreateOrderHandler;
use App\CRM\Domain\Core\Contracts\OrderContract;
use App\CRM\Domain\Core\Contracts\OrdersRepositoryContract;
use App\CRM\Domain\Core\Entities\Order;
use App\Traits\Loggable;
use JetBrains\PhpStorm\NoReturn;

class OrderService implements OrderContract
{
    use Loggable;

    public function __construct(
        private readonly CreateOrderHandler $createOrderHandler,
        private readonly OrdersRepositoryContract $ordersRepository
    ) {
    }

    /**
     * @throws \App\CRM\Application\Exceptions\OrderException
     */
    #[NoReturn] public function create(OrderDTO $dto): void
    {
        try {
            $command = new CreateOrderCommand(
                null,
                now()->toDateString(),
                $dto->customer,
                null,
                $dto->status,
                $dto->warehouse_id
            );
            $order = $this->createOrderHandler->__invoke($command);

            $this->ordersRepository->create($order);
        } catch (\Throwable $exception) {
            $this->logError($exception);
            throw OrderException::errorCreate();
        }
    }

    public function update(Order $order, array $data): Order
    {
        // TODO: Implement update() method.
    }

    public function complete(Order $order): void
    {
        // TODO: Implement complete() method.
    }

    public function cancel(Order $order): void
    {
        // TODO: Implement cancel() method.
    }

    public function restore(Order $order): void
    {
        // TODO: Implement restore() method.
    }
}