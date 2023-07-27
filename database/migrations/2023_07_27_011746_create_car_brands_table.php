<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('car_brands', function (Blueprint $table) {
            $table->id();
            $table->string('id_brand');
            $table->string('name');
            $table->string('cyrillic_name');
            $table->boolean('popular');
            $table->string('country');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_brands');
    }
};
