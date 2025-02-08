<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JobMetric\Extension\Models\Plugin;

/**
 * JobMetric\Accounting\Models\DocumentAutomation
 *
 * @property int $id
 * @property int $plugin_id
 * @property string $countingable_type
 * @property int $countingable_id
 * @property int $nature
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Plugin $plugin
 * @property-read Model $countingable
 *
 * @method DocumentAutomation find(int $int)
 * @method DocumentAutomation findOrFail(int $int)
 */
class DocumentAutomation extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'plugin_id',
        'countingable_type',
        'countingable_id',
        'nature',
    ];

    /**
     * The document automation that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'plugin_id' => 'integer',
        'countingable_type' => 'string',
        'countingable_id' => 'integer',
        'nature' => 'integer',
    ];

    public function getTable()
    {
        return config('accounting.tables.document_automation', parent::getTable());
    }

    /**
     * plugin relation
     *
     * @return BelongsTo
     */
    public function plugin(): BelongsTo
    {
        return $this->BelongsTo(Plugin::class, 'plugin_id');
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
}
