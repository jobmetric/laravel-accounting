<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JobMetric\Accounting\Enums\DocumentDurationGateEnum;
use JobMetric\Accounting\Enums\DocumentDurationStatusEnum;
use JobMetric\Accounting\Enums\DocumentDurationTypeEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('accounting.tables.document_duration'), function (Blueprint $table) {
            $table->id();

            $table->string('type', 30)->index();
            /**
             * value: cheque, credit, bank_paper
             * use: @extends DocumentDurationTypeEnum
             */

            $table->string('gate', 30)->index();
            /**
             * value: income, outcome
             * use: @extends DocumentDurationGateEnum
             */

            $table->foreignId('bank_id')->nullable()->index()->constrained(config('accounting.tables.bank'))->cascadeOnUpdate()->cascadeOnDelete();

            $table->unsignedDecimal('amount', 15, 3)->nullable();

            $table->string('status')->index();
            /**
             * value for cheque:income: get, pending, return, spent, failed, paid
             * value for cheque:outcome: empty, writing, pending, paid, failed, failed_job, return_to_bank
             *
             * value for credit:income: pending, cancel, paid
             * value for credit:outcome: pending, cancel, paid
             *
             * use: @extends DocumentDurationStatusEnum
             */

            $table->dateTime('due_date_at')->nullable()->index();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('accounting.tables.document_duration'));
    }
};
