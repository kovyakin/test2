<?php

declare(strict_types=1);

namespace App\CRM\Application\Services;

use app\CRM\Application\Exceptions\WarehouseException;
use App\CRM\Domain\Core\Contracts\WarehouseGetAllContract;
use App\CRM\Domain\Core\Contracts\WarehousesRepositoryContract;
use App\CRM\Infrastructure\Http\Resources\WarehouseResource;
use App\Traits\Loggable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

readonly class WarehouseGeaAllService implements WarehouseGetAllContract
{
    use Loggable;
    public function __construct(
        private WarehousesRepositoryContract $warehousesRepository
    ) {
    }

    /**
     * @throws \app\CRM\Application\Exceptions\WarehouseException
     */
    public function execute(): AnonymousResourceCollection
    {
        try {
            return WarehouseResource::collection($this->warehousesRepository->getAll());
        } catch (\Throwable $exception) {
            $this->logError($exception, []);
            throw WarehouseException::errorWarehouse();
        }
    }

}