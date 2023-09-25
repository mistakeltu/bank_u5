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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('account_date');

            $table->string('client_firstname');
            $table->string('client_lastname');
            $table->string('client_code');

            $table->integer('bank_amount')->nullable();

            // $table->string('account_amount');
            // $table->foreign('account_amount')->references('account_amount')->on('accounts');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
