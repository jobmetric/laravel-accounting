<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * JobMetric\Accounting\Models\Accounting
 *
 * @property int $id
 * @property int $parent_id
 * @property string $group
 * @property int $nature
 * @property string $conditions
 * @property bool $status
 * @property bool $visible
 * @property int $level
 * @property bool $editable
 * @property bool $deletable
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property_read Accounting $accounting
 *
 *@method Accounting find(int $int)
 */
class Accounting extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'parent_id',
        'group',
        'nature',
        'conditions',
        'status',
        'visible',
        'level',
        'editable',
        'deletable',
    ];

    /**
     * The Accountings that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'parent_id' => 'string',
        'group' => 'boolean',
        'nature' => 'boolean',
        'conditions' => 'integer',
        'status' => 'integer',
        'visible' => 'integer',
        'level' => 'integer',
        'editable' => 'integer',
        'deletable' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getTable()
    {
        return config('accounting.tables.account', parent::getTable());
    }


    /**
     * parent relation
     *
     * @return BelongsTo
     */
    public function accounting(): BelongsTo
    {
        return $this->BelongsTo(Accounting::class, 'parent_id');
    }
}
