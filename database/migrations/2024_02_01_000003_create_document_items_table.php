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
        Schema::create(config('accounting.tables.document_item'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->index()->constrained(config('authio.tables.user'))->cascadeOnUpdate()->nullOnDelete();

            $table->foreignId('document_id')->index()->constrained(config('accounting.tables.document'))->cascadeOnUpdate()->cascadeOnDelete();

            $table->morphs('countingable');
            /**
             * countingable to:
             *
             * UserAccount
             * Product
             * Bank
             * Cashier
             * Branch (taxonomy type=branch)
             * Cheque
             * Account
             */

            $table->foreignId('reference_id')->nullable()->index()->constrained(config('accounting.tables.account'))->cascadeOnUpdate()->nullOnDelete();
            /**
             * It must be connected to a specific account.
             */

            $table->enum('sign', [1, -1])->default(1);
            $table->decimal('amount', 15, 3)->default(0);

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
        Schema::dropIfExists(config('accounting.tables.document_item'));
    }
};
