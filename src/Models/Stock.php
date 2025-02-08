<?php

namespace JobMetric\Accounting\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JobMetric\Product\Models\Product;
use JobMetric\Taxonomy\Models\Taxonomy;

/**
 * JobMetric\Accounting\Models\Stock
 *
 * @property int $id
 * @property int $taxonomy_id
 * @property int $document_item_id
 * @property int $product_id
 * @property int $sign
 * @property float $quantity
 * @property Carbon $created_at
 *
 * @property-read Taxonomy $taxonomy
 * @property-read DocumentItem $documentItem
 * @property-read Product $product
 *
 * @method Stock find(int $int)
 * @method Stock findOrFail(int $int)
 */
class Stock extends Model
{
    use HasFactory;

    const UPDATED_AT = null;

    protected $fillable = [
        'taxonomy_id',
        'document_item_id',
        'product_id',
        'sign',
        'quantity',
    ];

    /**
     * The stock that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'taxonomy_id' => 'integer',
        'document_item_id' => 'integer',
        'product_id' => 'integer',
        'sign' => 'integer',
        'quantity' => 'decimal:3',
    ];

    public function getTable()
    {
        return config('accounting.tables.stock', parent::getTable());
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
     * documentItem relation
     *
     * @return BelongsTo
     */
    public function documentItem(): BelongsTo
    {
        return $this->BelongsTo(DocumentItem::class, 'document_item_id');
    }

    /**
     * product relation
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class, 'product_id');
    }
}
