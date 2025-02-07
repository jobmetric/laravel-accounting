<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JobMetric\Accounting\Enums\BankTypeEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        /**
         * translatable
         */
        Schema::create(config('accounting.tables.bank'), function (Blueprint $table) {
            $table->id();

            $table->string('type')->index();
            /**
             * value: bank, cash
             * use: @extends BankTypeEnum
             */

            $table->foreignId('taxonomy_id')->nullable()->index()->constrained(config('taxonomy.tables.taxonomy'))->cascadeOnUpdate()->restrictOnDelete();
            /**
             * branch of bank
             */

            $table->foreignId('plugin_id')->nullable()->index()->constrained(config('extension.tables.plugin'))->cascadeOnUpdate()->restrictOnDelete();

            $table->boolean('status')->default(true)->index();

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
        Schema::dropIfExists(config('accounting.tables.bank'));
    }
};
