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
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->foreignId('field_id')->nullable()->index()->constrained('fields');
            $table->string('BTX_ID')->nullable();
            $table->string('VALUE')->nullable();
            $table->string('CRM_TYPE')->nullable();
            $table->string('ENTITY_VALUE_ID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values');
    }
};
