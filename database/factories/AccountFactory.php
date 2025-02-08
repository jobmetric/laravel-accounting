<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Enums\AccountGroupEnum;
use JobMetric\Accounting\Models\Account;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
            'group' => $this->faker->randomElement(AccountGroupEnum::values()),
            'nature' => $this->faker->randomElement([-1, 0, 1]),
            'conditions' => null,
            'status' => $this->faker->boolean,
            'visible' => $this->faker->boolean,
            'level' => $this->faker->numberBetween(1, 3),
            'editable' => $this->faker->boolean,
            'deletable' => $this->faker->boolean,
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
        return $this->state(fn(array $attributes) => [
            'parent_id' => $parent_id
        ]);
    }

    /**
     * set group
     *
     * @param string $group
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        return $this->state(fn(array $attributes) => [
            'group' => $group
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

    /**
     * set conditions
     *
     * @param array $conditions
     *
     * @return static
     */
    public function setConditions(array $conditions): static
    {
        return $this->state(fn(array $attributes) => [
            'conditions' => $conditions
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
     * set visible
     *
     * @param bool $visible
     *
     * @return static
     */
    public function setVisible(bool $visible): static
    {
        return $this->state(fn(array $attributes) => [
            'visible' => $visible
        ]);
    }

    /**
     * set level
     *
     * @param int $level
     *
     * @return static
     */
    public function setLevel(int $level): static
    {
        return $this->state(fn(array $attributes) => [
            'level' => $level
        ]);
    }

    /**
     * set editable
     *
     * @param bool $editable
     *
     * @return static
     */
    public function setEditable(bool $editable): static
    {
        return $this->state(fn(array $attributes) => [
            'editable' => $editable
        ]);
    }

    /**
     * set deletable
     *
     * @param bool $deletable
     *
     * @return static
     */
    public function setDeletable(bool $deletable): static
    {
        return $this->state(fn(array $attributes) => [
            'deletable' => $deletable
        ]);
    }
}
