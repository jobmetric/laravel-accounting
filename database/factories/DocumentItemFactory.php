<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Models\DocumentItem;

/**
 * @extends Factory<DocumentItem>
 */
class DocumentItemFactory extends Factory
{
    protected $model = DocumentItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'document_id' => null,
            'countingable_type' => null,
            'countingable_id' => null,
            'reference_id' => null,
            'sign' => $this->faker->randomElement([1, -1]),
            'amount' => $this->faker->randomFloat(3, 0, 1000),
        ];
    }

    /**
     * set user_id
     *
     * @param int $user_id
     *
     * @return static
     */
    public function setUserId(int $user_id): static
    {
        return $this->state(fn(array $attributes) => [
            'user_id' => $user_id
        ]);
    }

    /**
     * set document_id
     *
     * @param int $document_id
     *
     * @return static
     */
    public function setDocumentId(int $document_id): static
    {
        return $this->state(fn(array $attributes) => [
            'document_id' => $document_id
        ]);
    }

    /**
     * set countingable
     *
     * @param string $countingable_type
     * @param int $countingable_id
     *
     * @return static
     */
    public function setCountingable(string $countingable_type, int $countingable_id): static
    {
        return $this->state(fn(array $attributes) => [
            'countingable_type' => $countingable_type,
            'countingable_id' => $countingable_id
        ]);
    }

    /**
     * set reference_id
     *
     * @param int $reference_id
     *
     * @return static
     */
    public function setReferenceId(int $reference_id): static
    {
        return $this->state(fn(array $attributes) => [
            'reference_id' => $reference_id
        ]);
    }

    /**
     * set sign
     *
     * @param int $sign
     *
     * @return static
     */
    public function setSign(int $sign): static
    {
        return $this->state(fn(array $attributes) => [
            'sign' => $sign
        ]);
    }

    /**
     * set amount
     *
     * @param float $amount
     *
     * @return static
     */
    public function setAmount(float $amount): static
    {
        return $this->state(fn(array $attributes) => [
            'amount' => $amount
        ]);
    }
}
