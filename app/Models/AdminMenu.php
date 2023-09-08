<?php

namespace App\Models;

class AdminMenu extends BaseModel
{
    protected $fillable = ['id','name','title','url','path','pid','type','status','created_at','updated_at'];
}
