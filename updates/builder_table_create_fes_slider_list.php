<?php namespace Fes\Slider\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFesSliderList extends Migration
{
    public function up()
    {
        Schema::create('fes_slider_list', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->boolean('show_title')->default(0);
            $table->timestamps();
            $table->boolean('status')->default(1);
            $table->integer('sort_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fes_slider_list');
    }
}
