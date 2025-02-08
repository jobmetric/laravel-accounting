<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Models\Stock;

/**
 * @extends Factory<Stock>
 */
class StockFactory extends Factory
{
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'taxonomy_id' => null,
            'document_item_id' => null,
            'product_id' => null,
            'sign' => $this->faker->randomElement([1, -1]),
            'quantity' => $this->faker->randomFloat(3, 0, 1000),
        ];
    }

    /**
     * set taxonomy_id
     *
     * @param int $taxonomy_id
     *
     * @return static
     */
    public function setTaxonomyId(int $taxonomy_id): self
    {
        return $this->state(fn(array $attributes) => [
            'taxonomy_id' => $taxonomy_id
        ]);
    }

    /**
     * set document_item_id
     *
     * @param int $document_item_id
     *
     * @return static
     */
    public function setDocumentItemId(int $document_item_id): self
    {
        return $this->state(fn(array $attributes) => [
            'document_item_id' => $document_item_id
        ]);
    }

    /**
     * set product_id
     *
     * @param int $product_id
     *
     * @return static
     */
    public function setProductId(int $product_id): self
    {
        return $this->state(fn(array $attributes) => [
            'product_id' => $product_id
        ]);
    }

    /**
     * set sign
     *
     * @param int $sign
     *
     * @return static
     */
    public function setSign(int $sign): self
    {
        return $this->state(fn(array $attributes) => [
            'sign' => $sign
        ]);
    }

    /**
     * set quantity
     *
     * @param float $quantity
     *
     * @return static
     */
    public function setQuantity(float $quantity): self
    {
        return $this->state(fn(array $attributes) => [
            'quantity' => $quantity
        ]);
    }
}
