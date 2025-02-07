<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use JobMetric\Accounting\Enums\DocumentDurationStatusEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('accounting.tables.document_duration_status'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('document_duration_id')->index()->constrained(config('accounting.tables.document_duration'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('document_item_id')->index()->constrained(config('accounting.tables.document_item'))->cascadeOnDelete()->cascadeOnUpdate();

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

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('accounting.tables.document_duration_status'));
    }
};
