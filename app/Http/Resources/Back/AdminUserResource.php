<?php

namespace App\Http\Resources\Back;

use App\Models\AdminUserRole;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $array =  [
            'id' => $this->id,
            'username' => $this->username,
            'account' => $this->account,
            'status' => $this->status,
            'ip_address' => $this->ip_address,
            'roles' => $this->when($this->roles,function (){
                return $this->roles->isNotEmpty() ? $this->roles[0]->only(['id','name']) : '';
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
        $this->menus() && $array['menus'] = $this->menus();
        return $array;
    }
}
