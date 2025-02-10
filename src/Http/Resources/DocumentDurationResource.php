<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Accounting\Models\Bank;

/**
 * @property int $id
 * @property string $type
 * @property string $gate
 * @property int $bank_id
 * @property float $amount
 * @property string $status
 * @property Carbon $due_date_at
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Bank $bank
 */
class DocumentDurationResource extends JsonResource
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
            'gate' => $this->gate,
            'bank_id' => $this->bank_id,
            'amount' => $this->amount,
            'status' => $this->status,
            'due_date_at' => Carbon::make($this->due_date_at)->format('Y-m-d H:i:s'),
            'deleted_at' => $this->deleted_at ? Carbon::make($this->deleted_at)->format('Y-m-d H:i:s') : null,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'bank' => $this->whenLoaded('bank', function () {
                return new BankResource($this->bank);
            }),
        ];
    }
}
