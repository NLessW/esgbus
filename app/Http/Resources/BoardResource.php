<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
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
            'type' => $this->type,
            'type_label' => config('site.community')[$this->type],
            'name' => $this->type === 'private' ? $this->name : config('app.name'),
            'title' => $this->title,
            'title_limit' => Str::limit($this->title, 50),
            'image_url' => $this->image_url,
            'reg_date' => $this->created_at->format('Y-m-d'),
            'content' => $this->when($request->routeIs('community.show'), nl2br($this->content)),
            $this->mergeWhen($this->type == 'private' && $request->routeIs('community.show'), [
                'comment' => nl2br($this->comment),
                'commented_at' => $this->commented_at ? \Carbon\Carbon::parse($this->commented_at)->format('Y-m-d H:i') : null,
            ]),
            $this->mergeWhen($this->type == 'private' && $request->routeIs('community.private'), [
                'open' => session('board.private.' . $this->id) != null,
                'commented' => $this->commented_at != null,
            ]),
        ];
    }
}
