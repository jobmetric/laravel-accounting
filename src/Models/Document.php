<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use JobMetric\Authio\Models\User;
use JobMetric\Extension\Models\Plugin;

/**
 * JobMetric\Accounting\Models\Document
 *
 * @property int $id
 * @property int $user_id
 * @property int $plugin_id
 * @property string|null $atf
 * @property string|null $note
 * @property Carbon $datetime_at
 * @property Carbon $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property-read User $user
 * @property-read Plugin $plugin
 *
 * @method Document find(int $int)
 * @method Document findOrFail(int $int)
 */
class Document extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'user_id',
        'plugin_id',
        'atf',
        'note',
        'datetime_at'
    ];

    /**
     * The Bank that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id' => 'integer',
        'plugin_id' => 'integer',
        'atf' => 'string',
        'note' => 'string',
        'datetime_at' => 'datetime',
    ];

    public function getTable()
    {
        return config('accounting.tables.document', parent::getTable());
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
     * plugin relation
     *
     * @return BelongsTo
     */
    public function plugin(): BelongsTo
    {
        return $this->BelongsTo(Plugin::class, 'plugin_id');
    }
}
