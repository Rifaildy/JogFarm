<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => 'required|string',
            'productName' => 'required|string|max:255',
            'productDescription' => 'required|string',
            'productPrice' => 'required|numeric|min:0',
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
