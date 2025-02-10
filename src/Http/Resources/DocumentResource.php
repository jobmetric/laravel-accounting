<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Authio\Http\Resources\UserResource;
use JobMetric\Authio\Models\User;
use JobMetric\Extension\Http\Resources\PluginResource;
use JobMetric\Extension\Models\Plugin;

/**
 * @property int $id
 * @property int $user_id
 * @property int $plugin_id
 * @property string|null $atf
 * @property string|null $note
 * @property Carbon $datetime_at
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read User $user
 * @property-read Plugin $plugin
 */
class DocumentResource extends JsonResource
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
            'user_id' => $this->user_id,
            'plugin_id' => $this->plugin_id,
            'atf' => $this->atf,
            'note' => $this->note,
            'datetime_at' => Carbon::make($this->datetime_at)->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at ? Carbon::make($this->deleted_at)->format('Y-m-d H:i:s') : null,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'user' => $this->whenLoaded('user', function () {
                return new UserResource($this->user);
            }),

            'plugin' => $this->whenLoaded('plugin', function () {
                return new PluginResource($this->plugin);
            }),
        ];
    }
}
