<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->string('name');
            // $table->string('lastname');
            // $table->string('address');
            $table->string('telephone');
            $table->string('curriculum_vitae')->nullable();
            $table->string('image')->nullable();
            $table->string('performance');
            $table->string('promotion_counter')->nullable();

            $table->softDeletes();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table){
            $table->dropForeign('doctors_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
