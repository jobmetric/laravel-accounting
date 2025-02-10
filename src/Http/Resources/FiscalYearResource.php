<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Accounting\Models\Document;

/**
 * @property int $id
 * @property int $opening_document_id
 * @property int $profit_lost_document_id
 * @property int $closing_document_id
 * @property boolean $status
 * @property Carbon $started_at
 * @property Carbon $ended_at
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Document $openingDocument
 * @property-read Document $profitLostDocument
 * @property-read Document $closingDocument
 */
class FiscalYearResource extends JsonResource
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
            'opening_document_id' => $this->opening_document_id,
            'profit_lost_document_id' => $this->profit_lost_document_id,
            'closing_document_id' => $this->closing_document_id,
            'status' => $this->status,
            'started_at' => Carbon::make($this->started_at)->format('Y-m-d H:i:s'),
            'ended_at' => Carbon::make($this->ended_at)->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at ? Carbon::make($this->deleted_at)->format('Y-m-d H:i:s') : null,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'openingDocument' => $this->whenLoaded('openingDocument', function () {
                return new DocumentResource($this->openingDocument);
            }),

            'profitLostDocument' => $this->whenLoaded('profitLostDocument', function () {
                return new DocumentResource($this->profitLostDocument);
            }),

            'closingDocument' => $this->whenLoaded('closingDocument', function () {
                return new DocumentResource($this->closingDocument);
            }),
        ];
    }
}
