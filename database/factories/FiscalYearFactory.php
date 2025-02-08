<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Models\FiscalYear;

/**
 * @extends Factory<FiscalYear>
 */
class FiscalYearFactory extends Factory
{
    protected $model = FiscalYear::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'opening_document_id' => null,
            'profit_lost_document_id' => null,
            'closing_document_id' => null,
            'status' => true,
            'started_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'ended_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }

    /**
     * set opening_document_id
     *
     * @param int $opening_document_id
     *
     * @return static
     */
    public function setOpeningDocumentId(int $opening_document_id): static
    {
        return $this->state(fn(array $attributes) => [
            'opening_document_id' => $opening_document_id
        ]);
    }

    /**
     * set profit_lost_document_id
     *
     * @param int $profit_lost_document_id
     *
     * @return static
     */
    public function setProfitLostDocumentId(int $profit_lost_document_id): static
    {
        return $this->state(fn(array $attributes) => [
            'profit_lost_document_id' => $profit_lost_document_id
        ]);
    }

    /**
     * set closing_document_id
     *
     * @param int $closing_document_id
     *
     * @return static
     */
    public function setClosingDocumentId(int $closing_document_id): static
    {
        return $this->state(fn(array $attributes) => [
            'closing_document_id' => $closing_document_id
        ]);
    }

    /**
     * set status
     *
     * @param bool $status
     *
     * @return static
     */
    public function setStatus(bool $status): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => $status
        ]);
    }

    /**
     * set started_at
     *
     * @param string $started_at
     *
     * @return static
     */
    public function setStartedAt(string $started_at): static
    {
        return $this->state(fn(array $attributes) => [
            'started_at' => $started_at
        ]);
    }

    /**
     * set ended_at
     *
     * @param string $ended_at
     *
     * @return static
     */
    public function setEndedAt(string $ended_at): static
    {
        return $this->state(fn(array $attributes) => [
            'ended_at' => $ended_at
        ]);
    }
}
