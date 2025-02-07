<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JobMetric\Accounting\Enums\AccountGroupEnum;

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
         *
         * can not delete if have document_item
         */
        Schema::create(config('accounting.tables.account'), function (Blueprint $table) {
            $table->id();

            $table->foreignId('parent_id')->nullable()->index()->constrained(config('accounting.tables.account'))->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('group')->index();
            /**
             * value: current_assets, non_current_assets, current_liabilities, non_current_liabilities, ...
             * use: @extends AccountGroupEnum
             */

            $table->tinyInteger('nature')->default(0)->index();
            /**
             * default read parent
             *
             * (+1) -> creditor
             * 0 -> default
             * (-1) -> debtor
             */

            $table->json('conditions')->nullable();
            /**
             * conditions for filtering accounts use in level 3
             *
             * sample:
             * {
             *     "type": "User",
             *     "filter": {
             *         "group": "2"
             *     }
             * }
             */

            $table->boolean("status")->default(true)->index();
            $table->boolean("visible")->default(true)->index();
            /**
             * Accounts that we don't want everyone to know about and are given to users by paying or updating the software.
             */

            $table->unsignedTinyInteger('level')->index();
            /**
             * Leveling of accounts in terms of accounting
             *
             * 1- group
             * 2- Total account
             * 3- Moin account
             */

            $table->boolean('editable')->default(false)->index();
            $table->boolean('deletable')->default(false)->index();

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
        Schema::dropIfExists(config('accounting.tables.account'));
    }
};
