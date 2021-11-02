<?php

namespace App\Http\Resources;

use App\Constants\Media;
use Illuminate\Http\Request;

class UserResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return ['id' => $this->id, 'name' => $this->name, 'email' => $this->email, 'contact_number' => $this->contact_number];
    }
}
