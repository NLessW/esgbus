<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'code' => $this->code,
            'booking_date' => $this->booking_date,
            'number_adult' => $this->number_adult,
            'number_teenager' => $this->number_teenager,
            'number_child' => $this->number_child,
            'image_url' => $this->image_url,
            'active' => $this->active,
            'status' => config('site.booking.status')[$this->active],
            'reg_date' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
