<?php

declare(strict_types=1);

namespace App\CRM\Infrastructure\Http\Requests;

use App\CRM\Infrastructure\Eloquent\OrdersRepository;

class OrderFilterRequest
{
    private array $repository;
    private array $filters = [];

    public function __construct(
        private readonly OrdersRepository $ordersRepository,
    ) {
    }

    public function customer(string $customer): self
    {
        $this->filters['customer'] = $customer;

        return $this;
    }

    public function status(string $status): self
    {
        $this->filters['status'] = $status;

        return $this;
    }

    public function paginate(int $count): self
    {
        $this->filters['paginate'] = $count;

        return $this;
    }

    public function get(): array
    {
        $repository = [];
        if (isset($this->filters['paginate'])) {
            $repositories = $this->ordersRepository->getAll($this->filters['paginate']);
        } else {
            $repositories = $this->ordersRepository->getAll();
        };

        if (isset($this->filters['customer'])) {
            foreach ($repositories as $key => $repository) {
                if (empty($repository->customer($this->filters['customer']))) {
                    unset($repositories[$key]);
                }
            }
            $repositories = array_values($repositories);
        }

        if (isset($this->filters['status'])) {
            foreach ($repositories as $key => $repository) {
                if (empty($repository->status($this->filters['status']))) {
                    unset($repositories[$key]);
                }
            }
            $repositories = array_values($repositories);
        }

        $this->repository = $repositories;

        return $this->toArray();
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->repository as $item) {
            $array[] = $item->jsonSerialize();
        }
        return $array;
    }
}