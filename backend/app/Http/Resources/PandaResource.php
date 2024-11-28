<?php

namespace App\Http\Resources;

use App\Models\Panda;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PandaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sex' => $this->sex,
            'birth' => $this->birth,
        ];
    }
    public function index()
    {
        $pandas = Panda::all();
        return PandaResource::collection($pandas);
    }
}
