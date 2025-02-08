<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Models\Accounting;

/**
 * @extends Factory<Accounting>
 */
class AccountingFactory extends Factory
{
    protected $model = Accounting::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
        ];
    }

    /**
     * set parent_id
     *
     * @param int $parent_id
     *
     * @return static
     */
    public function setParentId(int $parent_id): static
    {
        return $this->state(fn(array $accounting) => [
            'parent_id' => $parent_id
        ]);
    }
}
