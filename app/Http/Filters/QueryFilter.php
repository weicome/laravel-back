<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


abstract class QueryFilter
{
    protected Builder $builder;
    public function __construct(protected Request $request){}

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;
        foreach ($this->filters() as $name => $value){
            if(method_exists($this,$name)){
                call_user_func_array([$this,$name], array_filter([$value]));
            }
        }
        return $this->builder;
    }

    public function filters(): array
    {
        return $this->request->all();
    }
}
