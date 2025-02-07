<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('accounting.tables.stock'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('taxonomy_id')->index()->constrained(config('taxonomy.tables.taxonomy'))->cascadeOnUpdate()->restrictOnDelete();
            /**
             * stock type
             */

            $table->foreignId('document_item_id')->index()->constrained(config('accounting.tables.document_item'))->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->index()->constrained(config('product.tables.product'))->cascadeOnUpdate()->restrictOnDelete();

            $table->enum('sign', [1, -1])->default(1);
            $table->unsignedDecimal('quantity', 15, 3);

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
        Schema::dropIfExists(config('accounting.tables.stock'));
    }
};
