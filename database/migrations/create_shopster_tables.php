<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateShopsterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('shopster.tables.products'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('full_name')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->bigInteger('price')->default(0);
            $table->bigInteger('old_price')->default(0);
            $table->timestamps();
        });

        Schema::create(Config::get('shopster.tables.attribute_groups'), function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->default(1);
            $table->string('name');
            $table->timestamps();
        });

        Schema::create(Config::get('shopster.tables.attributes'), function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attribute_group_id')
                  ->unsigned()
                  ->nullable();
            $table->string('name');
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });

        Schema::create(Config::get('shopster.tables.attribute_values'), function (Blueprint $table) {
            $table->id();
            $table->bigInteger('attribute_id')
                  ->unsigned()
                  ->nullable();
            $table->text('name');
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('shopster.tables.products'));
    }
}
