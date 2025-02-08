<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Models\DocumentAutomation;

/**
 * @extends Factory<DocumentAutomation>
 */
class DocumentAutomationFactory extends Factory
{
    protected $model = DocumentAutomation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'countingable_type' => null,
            'countingable_id' => null,
            'nature' => $this->faker->randomElement([1, -1]),
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
     * set nature
     *
     * @param int $nature
     *
     * @return static
     */
    public function setNature(int $nature): static
    {
        return $this->state(fn(array $attributes) => [
            'nature' => $nature
        ]);
    }
}
