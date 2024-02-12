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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('client_Id');
            $table->string('client_Name');
            $table->string('client_Country');
            $table->string('client_Province')->nullable();
            $table->string('client_City');
            $table->string('client_Mobile')->unique();
            $table->string('client_Email')->unique();
            $table->string('client_Password');
            $table->string('Is_Verify')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
