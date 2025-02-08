<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * JobMetric\Accounting\Models\FiscalYear
 *
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
 *
 * @method FiscalYear find(int $int)
 * @method FiscalYear findOrFail(int $int)
 */
class FiscalYear extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'opening_document_id',
        'profit_lost_document_id',
        'closing_document_id',
        'status',
        'started_at',
        'ended_at',
    ];

    /**
     * The fiscal year that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'opening_document_id' => 'integer',
        'profit_lost_document_id' => 'integer',
        'closing_document_id' => 'integer',
        'status' => 'boolean',
        'started_at' => 'datetime',
        'ended_at' => 'datetime',
    ];

    public function getTable()
    {
        return config('accounting.tables.fiscal_year', parent::getTable());
    }

    /**
     * openingDocument relation
     *
     * @return BelongsTo
     */
    public function openingDocument(): BelongsTo
    {
        return $this->BelongsTo(Document::class, 'opening_document_id');
    }

    /**
     * profitLostDocument relation
     *
     * @return BelongsTo
     */
    public function profitLostDocument(): BelongsTo
    {
        return $this->BelongsTo(Document::class, 'profit_lost_document_id');
    }

    /**
     * closingDocument relation
     *
     * @return BelongsTo
     */
    public function closingDocument(): BelongsTo
    {
        return $this->BelongsTo(Document::class, 'closing_document_id');
    }
}
