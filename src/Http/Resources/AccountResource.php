<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Accounting\Models\Account;

/**
 * @property int $id
 * @property int|null $parent_id
 * @property string $group
 * @property int $nature
 * @property array|null $conditions
 * @property bool $status
 * @property bool $visible
 * @property int $level
 * @property bool $editable
 * @property bool $deletable
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Account $parent
 */
class AccountResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'group' => $this->group,
            'nature' => $this->nature,
            'conditions' => $this->conditions,
            'status' => $this->status,
            'visible' => $this->visible,
            'level' => $this->level,
            'editable' => $this->editable,
            'deletable' => $this->deletable,
            'deleted_at' => $this->deleted_at ? Carbon::make($this->deleted_at)->format('Y-m-d H:i:s') : null,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::make($this->updated_at)->format('Y-m-d H:i:s'),

            'parent' => $this->whenLoaded('parent', function () {
                return new AccountResource($this->parent);
            }),
        ];
    }
}
