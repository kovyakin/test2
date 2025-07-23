<?php

namespace App\CRM\Infrastructure\Http\Requests;

use App\CRM\Application\DTOs\OrderItemDTO;
use Illuminate\Foundation\Http\FormRequest;

class OrderItemsRequest extends FormRequest
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
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'count' => 'required|integer',
        ];
    }

    public function getDTO(): OrderItemDTO
    {
        return OrderItemDTO::fromArray($this->validated());
    }
}
