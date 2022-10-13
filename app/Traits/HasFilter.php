<?php

namespace App\Traits;

trait HasFilter
{
    /**
     * Scope a query to  include filters .
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query)
    {
        return $query
        ->when(request()->has('category_id') && request()->category_id != 'All',fn() => $query->where('category_id',request()->category_id))
        ->when(request()->has('is_active') && request()->is_active != 'All',fn() => $query->where('is_active',request()->is_active))
        ->when(request()->has('is_blocked') && request()->is_blocked != 'All',fn() => $query->where('is_blocked',request()->is_blocked))
        ->when(request()->has('order_by') &&  in_array(request()->order_by,['asc','desc']),fn() => $query->orderBy('created_at',request()->order_by));
    }
}
