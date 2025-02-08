<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JobMetric\Extension\Models\Plugin;
use JobMetric\Taxonomy\Models\Taxonomy;

/**
 * JobMetric\Accounting\Models\Bonk
 *
 * @property int $id
 * @property string $type
 * @property int $taxonomy_id
 * @property int $plugin_id
 * @property bool $status
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Taxonomy $taxonomy
 * @property-read Plugin $plugin
 *
 * @method Bank find(int $int)
 * @method Bank findOrFail(int $int)
 */
class Bank extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'type',
        'taxonomy_id',
        'plugin_id',
        'status',
    ];

    /**
     * The bank that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'string',
        'taxonomy_id' => 'integer',
        'plugin_id' => 'integer',
        'status' => 'boolean',
    ];

    public function getTable()
    {
        return config('accounting.tables.bank', parent::getTable());
    }

    /**
     * taxonomy relation
     *
     * @return BelongsTo
     */
    public function taxonomy(): BelongsTo
    {
        return $this->BelongsTo(Taxonomy::class, 'taxonomy_id');
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
}
