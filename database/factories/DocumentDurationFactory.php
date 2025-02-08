<?php

namespace JobMetric\Accounting\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Enums\DocumentDurationGateEnum;
use JobMetric\Accounting\Enums\DocumentDurationStatusEnum;
use JobMetric\Accounting\Enums\DocumentDurationTypeEnum;
use JobMetric\Accounting\Models\DocumentDuration;

/**
 * @extends Factory<DocumentDuration>
 */
class DocumentDurationFactory extends Factory
{
    protected $model = DocumentDuration::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(DocumentDurationTypeEnum::values()),
            'gate' => $this->faker->randomElement(DocumentDurationGateEnum::values()),
            'bank_id' => null,
            'amount' => $this->faker->randomFloat(3, 0, 1000),
            'status' => $this->faker->randomElement(DocumentDurationStatusEnum::values()),
            'due_date_at' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
        ];
    }

    /**
     * set type
     *
     * @param string $type
     *
     * @return static
     */
    public function setType(string $type): static
    {
        return $this->state(fn(array $attributes) => [
            'type' => $type
        ]);
    }

    /**
     * set gate
     *
     * @param string $gate
     *
     * @return static
     */
    public function setGate(string $gate): static
    {
        return $this->state(fn(array $attributes) => [
            'gate' => $gate
        ]);
    }

    /**
     * set bank_id
     *
     * @param int $bank_id
     *
     * @return static
     */
    public function setBankId(int $bank_id): static
    {
        return $this->state(fn(array $attributes) => [
            'bank_id' => $bank_id
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

    /**
     * set status
     *
     * @param string $status
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => $status
        ]);
    }

    /**
     * set due_date_at
     *
     * @param DateTime $due_date_at
     *
     * @return static
     */
    public function setDueDateAt(DateTime $due_date_at): static
    {
        return $this->state(fn(array $attributes) => [
            'due_date_at' => $due_date_at
        ]);
    }
}
