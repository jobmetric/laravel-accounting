<?php

namespace JobMetric\Accounting\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Models\Document;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'plugin_id' => null,
            'atf' => $this->faker->word,
            'note' => $this->faker->text,
            'datetime_at' => $this->faker->dateTime,
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
     * set atf
     *
     * @param string $atf
     *
     * @return static
     */
    public function setAtf(string $atf): static
    {
        return $this->state(fn(array $attributes) => [
            'atf' => $atf
        ]);
    }

    /**
     * set note
     *
     * @param string $note
     *
     * @return static
     */
    public function setNote(string $note): static
    {
        return $this->state(fn(array $attributes) => [
            'note' => $note
        ]);
    }

    /**
     * set datetime_at
     *
     * @param DateTime $datetime_at
     *
     * @return static
     */
    public function setDatetimeAt(DateTime $datetime_at): static
    {
        return $this->state(fn(array $attributes) => [
            'datetime_at' => $datetime_at
        ]);
    }
}
