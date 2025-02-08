<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Enums\BankTypeEnum;
use JobMetric\Accounting\Models\Bank;

/**
 * @extends Factory<Bank>
 */
class BankFactory extends Factory
{
    protected $model = Bank::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(BankTypeEnum::values()),
            'taxonomy_id' => null,
            'plugin_id' => null,
            'status' => $this->faker->boolean(90),
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
     * set taxonomy_id
     *
     * @param int $taxonomy_id
     *
     * @return static
     */
    public function setTaxonomyId(int $taxonomy_id): static
    {
        return $this->state(fn(array $attributes) => [
            'taxonomy_id' => $taxonomy_id
        ]);
    }

    /**
     * set plugin_id
     *
     * @param int $plugin_id
     *
     * @return static
     */
    public function setPluginId(int $plugin_id): static
    {
        return $this->state(fn(array $attributes) => [
            'plugin_id' => $plugin_id
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
}
