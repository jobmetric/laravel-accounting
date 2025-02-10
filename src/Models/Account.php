<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * JobMetric\Accounting\Models\Account
 *
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
 *
 * @method Account find(int $int)
 * @method Account findOrFail(int $int)
 */
class Account extends Model
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
     * The account that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'parent_id' => 'string',
        'group' => 'boolean',
        'nature' => 'boolean',
        'conditions' => AsArrayObject::class,
        'status' => 'boolean',
        'visible' => 'boolean',
        'level' => 'integer',
        'editable' => 'boolean',
        'deletable' => 'boolean',
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
    public function parent(): BelongsTo
    {
        return $this->BelongsTo(Account::class, 'parent_id');
    }
}
