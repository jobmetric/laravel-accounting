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
        Schema::create(config('accounting.tables.document'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->index()->constrained(config('authio.tables.user'))->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('plugin_id')->index()->constrained(config('extension.tables.plugin'))->cascadeOnUpdate()->restrictOnDelete();

            $table->string('atf')->nullable();
            $table->text('note')->nullable();

            $table->dateTime('datetime_at');

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
        Schema::dropIfExists(config('accounting.tables.document'));
    }
};
