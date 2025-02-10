<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Accounting\Models\DocumentDuration;
use JobMetric\Accounting\Models\DocumentItem;

/**
 * @property int $id
 * @property int $document_duration_id
 * @property int $document_item_id
 * @property string $status
 * @property string $description
 * @property Carbon $created_at
 *
 * @property-read DocumentDuration $documentDuration
 * @property-read DocumentItem $documentItem
 */
class DocumentDurationStatusResource extends JsonResource
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
            'document_duration_id' => $this->document_duration_id,
            'document_item_id' => $this->document_item_id,
            'status' => $this->status,
            'description' => $this->description,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),

            'documentDuration' => $this->whenLoaded('documentDuration', function () {
                return new DocumentDurationResource($this->documentDuration);
            }),

            'documentItem' => $this->whenLoaded('documentItem', function () {
                return new DocumentItemResource($this->documentItem);
            }),
        ];
    }
}
