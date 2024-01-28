<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WinningHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'prize' => new PrizeResource($this->whenLoaded('prize')),
            'ticket' => new TicketResource($this->whenLoaded('ticket')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
