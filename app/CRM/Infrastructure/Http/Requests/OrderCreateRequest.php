<?php

namespace App\CRM\Infrastructure\Http\Requests;

use App\CRM\Application\DTOs\OrderDTO;
use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer' => 'required',
            'status' => 'required',
            'warehouse_id' => 'required|integer|exists:warehouses,id',
        ];
    }

    public function getDTO(): OrderDTO
    {
        return OrderDTO::fromArray($this->validated());
    }
}
