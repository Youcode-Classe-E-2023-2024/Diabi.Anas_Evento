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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('event_id')->nullable()->constrained('events', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('is_aprroved')->default(false);
            $table->integer('tickets');
            $table->timestamps();
        });           
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
