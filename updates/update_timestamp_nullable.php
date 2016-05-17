<?php namespace Fes\Slider\Updates;

use Schema;
use DbDongle;
use October\Rain\Database\Updates\Migration;

class UpdateTimestampsNullable extends Migration
{
    public function up()
    {
        DbDongle::disableStrictMode();
        DbDongle::convertTimestamps('fes_slider_list');
    }

    public function down()
    {
    }
}
