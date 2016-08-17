<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            // same as => id INT UNSIGNED NOT NULL AUTO_INCREMENT

            $table->timestamps();
            // created_at DATETIME NOT NULL
            // updated_at DATETIME NOT Null
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
