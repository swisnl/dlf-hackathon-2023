<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->after('cents_charged', function ($table) {
                $table->string('mollie_id')->nullable();
                $table->string('mollie_status');
                $table->string('order_id')->nullable();
            });
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('mollie_id');
            $table->dropColumn('mollie_status');
            $table->dropColumn('order_id');
        });
    }
};
