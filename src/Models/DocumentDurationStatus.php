<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * JobMetric\Accounting\Models\DocumentDurationStatus
 *
 * @property int $id
 * @property int $document_duration_id
 * @property int $document_item_id
 * @property string $status
 * @property string $description
 * @property Carbon $created_at
 *
 * @property-read DocumentDuration $documentDuration
 * @property-read DocumentItem $documentItem
 *
 * @method DocumentDurationStatus find(int $int)
 * @method DocumentDurationStatus findOrFail(int $int)
 */
class DocumentDurationStatus extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'document_duration_id',
        'document_item_id',
        'status',
        'description',
    ];

    /**
     * The document duration that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'document_duration_id' => 'integer',
        'document_item_id' => 'integer',
        'status' => 'string',
        'description' => 'string',
    ];

    public function getTable()
    {
        return config('accounting.tables.document_duration_status', parent::getTable());
    }

    /**
     * documentDuration relation
     *
     * @return BelongsTo
     */
    public function documentDuration(): BelongsTo
    {
        return $this->belongsTo(DocumentDuration::class, 'document_duration_id');
    }

    /**
     * documentItem relation
     *
     * @return BelongsTo
     */
    public function documentItem(): BelongsTo
    {
        return $this->belongsTo(DocumentItem::class, 'document_item_id');
    }
}
