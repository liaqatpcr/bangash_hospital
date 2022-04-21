<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id')->comment = "Primary Key. Autoincrement";
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //$table->addColumn('tinyInteger', 'is_active', ['length' => 1]);
            $table->string('user_type')->nullable()->default("admin");
            $table->string('img_path')->nullable()->default("dist/img/avatar5.png");
            $table->integer('fingerprint')->nullable()->unique();
            $table->biginteger('contactnumber');
            $table->string('education')->nullable();
            $table->string('location')->nullable();
            $table->string('skills')->nullable();
            $table->string('notes');
            $table->tinyInteger('is_active')->default('1');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
