<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tenant_id')
                ->references('id')
                ->on('tenants')
                ->restrictOnDelete();
            $table->foreignUuid('account_id')
                ->nullable()
                ->references('id')
                ->on('accounts')
                ->restrictOnDelete();
            $table->integer('grams_of_co2');
            $table->integer('cents_charged');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
