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
        Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('name', 100);
        $table->string('lastname', 100)->nullable();
        $table->string('phone_number', 20)->nullable();
        $table->string('email', 255)->nullable();
        $table->string('address', 255)->nullable();
        $table->text('notes')->nullable();
        $table->boolean('favorite')->default(false);
        $table->softDeletes(); // papelera
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
