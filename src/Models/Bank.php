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
 * @property bool $status
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read Taxonomy $taxonomy
 * @property-read Plugin $plugin
 *
 * @method Bank find(int $int)
 */
class Bank extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'type',
        'status',
    ];

    /**
     * The Bank that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => 'string',
        'status' => 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
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
