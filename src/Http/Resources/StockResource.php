<?php

namespace JobMetric\Accounting\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JobMetric\Accounting\Models\DocumentItem;
use JobMetric\Product\Http\Resources\ProductResource;
use JobMetric\Product\Models\Product;
use JobMetric\Taxonomy\Http\Resources\TaxonomyResource;
use JobMetric\Taxonomy\Models\Taxonomy;

/**
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
 */
class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'taxonomy_id' => $this->taxonomy_id,
            'document_item_id' => $this->document_item_id,
            'product_id' => $this->product_id,
            'sign' => $this->sign,
            'quantity' => $this->quantity,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),

            'taxonomy' => $this->whenLoaded('taxonomy', function () {
                return new TaxonomyResource($this->taxonomy);
            }),

            'documentItem' => $this->whenLoaded('documentItem', function () {
                return new DocumentItemResource($this->documentItem);
            }),

            'product' => $this->whenLoaded('product', function () {
                return new ProductResource($this->product);
            }),
        ];
    }
}
