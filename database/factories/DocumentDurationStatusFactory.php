<?php

namespace JobMetric\Accounting\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JobMetric\Accounting\Enums\DocumentDurationStatusEnum;
use JobMetric\Accounting\Models\DocumentDurationStatus;

/**
 * @extends Factory<DocumentDurationStatus>
 */
class DocumentDurationStatusFactory extends Factory
{
    protected $model = DocumentDurationStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document_duration_id' => null,
            'document_item_id' => null,
            'status' => $this->faker->randomElement(DocumentDurationStatusEnum::values()),
            'description' => $this->faker->sentence,
        ];
    }

    /**
     * set document_duration_id
     *
     * @param int $document_duration_id
     *
     * @return static
     */
    public function setDocumentDurationId(int $document_duration_id): self
    {
        return $this->state(fn() => [
            'document_duration_id' => $document_duration_id,
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
        return $this->state(fn() => [
            'document_item_id' => $document_item_id,
        ]);
    }

    /**
     * set status
     *
     * @param string $status
     *
     * @return static
     */
    public function setStatus(string $status): self
    {
        return $this->state(fn() => [
            'status' => $status,
        ]);
    }

    /**
     * set description
     *
     * @param string|null $description
     *
     * @return static
     */
    public function setDescription(string|null $description): self
    {
        return $this->state(fn() => [
            'description' => $description,
        ]);
    }
}
