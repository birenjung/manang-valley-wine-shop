<?php
// app/Filters/OrderFilter.php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OrderFilter
{
    protected Builder $builder;
    protected Request $request;

    public function __construct(Builder $builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply(): Builder
    {
        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter) && $this->hasValue($value)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    protected function getFilters(): array
    {
        return $this->request->only([
            'search', 'status', 'date_from', 'date_to', 
            'customer_id', 'sort_by', 'sort_direction'
        ]);
    }

    protected function hasValue($value): bool
    {
        return $value !== null && $value !== '';
    }

    protected function search($value): void
    {
        $this->builder->where(function ($query) use ($value) {
            $query->where('id', 'LIKE', "%{$value}%")
                  ->orWhere('notes', 'LIKE', "%{$value}%");
                  
            // If you have customer relationship, uncomment below:
            // ->orWhereHas('customer', function ($q) use ($value) {
            //     $q->where('name', 'LIKE', "%{$value}%")
            //       ->orWhere('email', 'LIKE', "%{$value}%");
            // });
        });
    }

    protected function status($value): void
    {
        $this->builder->where('status', $value);
    }

    protected function date_from($value): void
    {
        $this->builder->whereDate('created_at', '>=', $value);
    }

    protected function date_to($value): void
    {
        $this->builder->whereDate('created_at', '<=', $value);
    }

    protected function customer_id($value): void
    {
        $this->builder->where('customer_id', $value);
    }

    protected function sort_by($value): void
    {
        $direction = $this->request->input('sort_direction', 'desc');
        $this->builder->orderBy($value, $direction);
    }
}