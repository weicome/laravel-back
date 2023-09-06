<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static filter(QueryFilter $filter)
 */
abstract class BaseModel extends Model
{
    use HasFactory;

    /**
     * @param $query
     * @param QueryFilter $filter
     * @return Builder
     */
    public function scopeFilter($query, QueryFilter $filter): Builder
    {
        return $filter->apply($query);
    }

}
