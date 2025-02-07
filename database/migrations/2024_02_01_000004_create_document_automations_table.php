<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('accounting.tables.document_automation'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('plugin_id')->index()->constrained(config('extension.tables.plugin'))->cascadeOnUpdate()->restrictOnDelete();

            $table->morphs('countingable');
            /**
             * countingable to:
             *
             * User
             * Product
             * Bank
             * Cashier
             * Branch (taxonomy type=branch)
             * Cheque
             * Account
             */

            $table->tinyInteger('nature');
            /**
             * default read parent
             *
             * (+1) -> creditor
             * (-1) -> debtor
             */

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
        Schema::dropIfExists(config('accounting.tables.document_automation'));
    }
};
