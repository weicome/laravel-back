<?php

namespace App\Models;

class AdminMenu extends BaseModel
{
    protected $fillable = ['id','title','name','path','icon','component','redirect','pid',
        'route', 'type', 'status','sort','created_at','updated_at'];
}
