<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Accounting\Models\Account;
use JobMetric\Extension\Http\Resources\PluginResource;
use JobMetric\Extension\Models\Plugin;
use JobMetric\Taxonomy\Http\Resources\TaxonomyResource;
use JobMetric\Taxonomy\Models\Taxonomy;

/**
 * @property int $id
 * @property string $type
 * @property int $taxonomy_id
 * @property int $plugin_id
 * @property bool $status
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Taxonomy $taxonomy
 * @property-read Plugin $plugin
 */
class BankResource extends JsonResource
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
            'type' => $this->type,
            'taxonomy_id' => $this->taxonomy_id,
            'plugin_id' => $this->plugin_id,
            'status' => $this->status,
            'deleted_at' => $this->deleted_at ? Carbon::make($this->deleted_at)->format('Y-m-d H:i:s') : null,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'taxonomy' => $this->whenLoaded('taxonomy', function () {
                return new TaxonomyResource($this->taxonomy);
            }),

            'plugin' => $this->whenLoaded('plugin', function () {
                return new PluginResource($this->plugin);
            }),
        ];
    }
}
