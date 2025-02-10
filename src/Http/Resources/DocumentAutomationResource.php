<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Extension\Http\Resources\PluginResource;
use JobMetric\Extension\Models\Plugin;

/**
 * @property int $id
 * @property int $plugin_id
 * @property string $countingable_type
 * @property int $countingable_id
 * @property int $nature
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property mixed $countingable_resource
 *
 * @property-read Plugin $plugin
 */
class DocumentAutomationResource extends JsonResource
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
            'plugin_id' => $this->plugin_id,
            'countingable_type' => $this->countingable_type,
            'countingable_id' => $this->countingable_id,
            'nature' => $this->nature,
            'deleted_at' => $this->deleted_at ? Carbon::make($this->deleted_at)->format('Y-m-d H:i:s') : null,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'countingable' => $this?->countingable_resource,

            'plugin' => $this->whenLoaded('plugin', function () {
                return new PluginResource($this->plugin);
            }),
        ];
    }
}
