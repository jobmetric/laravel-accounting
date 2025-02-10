<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Accounting\Models\Document;
use JobMetric\Authio\Http\Resources\UserResource;
use JobMetric\Authio\Models\User;
use JobMetric\Extension\Http\Resources\PluginResource;
use JobMetric\Extension\Models\Plugin;

/**
 * @property int $id
 * @property int $user_id
 * @property int $document_id
 * @property string $countingable_type
 * @property int $countingable_id
 * @property int|null $reference_id
 * @property int $sign
 * @property float $amount
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property mixed $countingable_resource
 *
 * @property-read User $user
 * @property-read Document $document
 * @property-read mixed $countingable
 */
class DocumentItemResource extends JsonResource
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
            'document_id' => $this->document_id,
            'countingable_type' => $this->countingable_type,
            'countingable_id' => $this->countingable_id,
            'reference_id' => $this->reference_id,
            'sign' => $this->sign,
            'amount' => $this->amount,
            'deleted_at' => $this->deleted_at ? Carbon::make($this->deleted_at)->format('Y-m-d H:i:s') : null,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'countingable' => $this?->countingable_resource,

            'user' => $this->whenLoaded('user', function () {
                return new UserResource($this->user);
            }),

            'document' => $this->whenLoaded('document', function () {
                return new DocumentResource($this->document);
            }),
        ];
    }
}
