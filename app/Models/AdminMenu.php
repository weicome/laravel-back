<?php

namespace App\Models;

class AdminMenu extends BaseModel
{
    protected $fillable = ['id','name','title','url','path','pid','type','status','sort','icon','created_at','updated_at'];
}
