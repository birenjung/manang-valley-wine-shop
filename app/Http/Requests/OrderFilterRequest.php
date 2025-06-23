<?php
// app/Http/Requests/OrderFilterRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'customer_id' => 'nullable|integer',
            'sort_by' => 'nullable|in:created_at,updated_at,total_amount,status,id',
            'sort_direction' => 'nullable|in:asc,desc',
            'per_page' => 'nullable|integer|min:1|max:100',
        ];
    }

    public function filters(): array
    {
        return $this->only([
            'search', 'status', 'date_from', 'date_to', 
            'customer_id', 'sort_by', 'sort_direction'
        ]);
    }

    public function paginationParams(): array
    {
        return [
            'per_page' => $this->input('per_page', 15),
            'sort_by' => $this->input('sort_by', 'created_at'),
            'sort_direction' => $this->input('sort_direction', 'desc'),
        ];
    }
}