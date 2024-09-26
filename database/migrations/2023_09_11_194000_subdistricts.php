<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->id();
            $table->integer('subdis_id');
            $table->string('subdis_name');
            $table->integer('dis_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subdistricts');
    }
};
