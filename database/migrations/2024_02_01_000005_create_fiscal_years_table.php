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
        Schema::create(config('accounting.tables.fiscal_year'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('opening_document_id')->nullable()->index()->constrained(config('accounting.tables.document'))->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('profit_lost_document_id')->nullable()->index()->constrained(config('accounting.tables.document'))->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('closing_document_id')->nullable()->index()->constrained(config('accounting.tables.document'))->cascadeOnUpdate()->nullOnDelete();

            $table->boolean('status')->default(true)->index();

            $table->dateTime('started_at');
            $table->dateTime('ended_at');

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
        Schema::dropIfExists(config('accounting.tables.fiscal_year'));
    }
};
