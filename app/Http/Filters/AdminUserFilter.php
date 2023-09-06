<?php

namespace App\Http\Filters;

class AdminUserFilter extends QueryFilter
{
    public function username($username)
    {
        return $this->builder->where('username','like',"%{$username}%");
    }
}
