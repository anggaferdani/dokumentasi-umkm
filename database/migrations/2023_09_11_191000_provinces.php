<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->integer('prov_id');
            $table->string('prov_name');
            $table->string('map_name');
            $table->string('simple_name');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->integer('locationid');
            $table->integer('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
