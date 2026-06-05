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
        Schema::create('home_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->longText('desc');
            $table->integer('building_area');
            $table->integer('land_area');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->integer('price');
            $table->integer('electrical_power');
            // $table->enum('type_property',['rumah', 'ruko', 'tanah']); 
            $table->enum('status',['dijual', 'terjual','sewa','tersewa']); 
            $table->string('floorplan')->nullable();
            $table->string('sketch_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_lists');
    }
};
