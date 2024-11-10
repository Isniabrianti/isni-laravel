<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('country')->nullable();
        $table->string('postal_code')->nullable();
        $table->text('about_me')->nullable();
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('first_name');
        $table->dropColumn('last_name');
        $table->dropColumn('address');
        $table->dropColumn('city');
        $table->dropColumn('country');
        $table->dropColumn('postal_code');
        $table->dropColumn('about_me');
    });
}

};
