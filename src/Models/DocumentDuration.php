<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * JobMetric\Accounting\Models\DocumentDuration
 *
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
 *
 * @method DocumentDuration find(int $int)
 * @method DocumentDuration findOrFail(int $int)
 */
class DocumentDuration extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'type',
        'gate',
        'bank_id',
        'amount',
        'status',
        'due_date_at',
    ];

    /**
     * The document duration that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'string',
        'gate' => 'string',
        'bank_id' => 'int',
        'amount' => 'decimal:3',
        'status' => 'string',
        'due_date_at' => 'datetime',
    ];

    public function getTable()
    {
        return config('accounting.tables.document_duration', parent::getTable());
    }

    /**
     * bank relation
     *
     * @return BelongsTo
     */
    public function bank(): BelongsTo
    {
        return $this->BelongsTo(Bank::class, 'bank_id');
    }
}
