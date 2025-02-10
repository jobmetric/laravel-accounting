<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JobMetric\Accounting\Events\CountingableResourceEvent;
use JobMetric\Authio\Models\User;

/**
 * JobMetric\Accounting\Models\DocumentItem
 *
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
 * @property-read Model $countingable
 *
 * @method DocumentItem find(int $int)
 * @method DocumentItem findOrFail(int $int)
 */
class DocumentItem extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'user_id',
        'document_id',
        'countingable_type',
        'countingable_id',
        'reference_id',
        'sign',
        'amount',
    ];

    /**
     * The document item that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
        'document_id' => 'integer',
        'countingable_type' => 'string',
        'countingable_id' => 'integer',
        'reference_id' => 'integer',
        'sign' => 'integer',
        'amount' => 'decimal:3',
    ];

    public function getTable()
    {
        return config('accounting.tables.document_item', parent::getTable());
    }

    /**
     * user relation
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    /**
     * document relation
     *
     * @return BelongsTo
     */
    public function document(): BelongsTo
    {
        return $this->BelongsTo(Document::class, 'document_id');
    }

    /**
     * countingable relation
     *
     * @return MorphTo
     */
    public function countingable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the countingable resource attribute.
     */
    public function getCountingableResourceAttribute()
    {
        $event = new CountingableResourceEvent($this->countingable);
        event($event);

        return $event->resource;
    }
}
