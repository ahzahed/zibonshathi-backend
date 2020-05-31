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
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('height')->nullable();
            $table->string('location')->nullable();
            $table->string('religion')->nullable();
            $table->string('mothertongue')->nullable();
            $table->string('occupation')->nullable();
            $table->string('maritalstatus')->nullable();
            // $table->string('avatar')->default('public/Frontend/images/default-avatar.png');
            $table->string('avatar')->nullable();

            $table->tinyInteger('user_type')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('pending')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->text('details')->nullable();

            $table->string('weight')->nullable();
            $table->string('bodytype')->nullable();
            $table->string('blood')->nullable();
            $table->string('smoke')->nullable();
            $table->string('complexion')->nullable();
            $table->string('dob')->nullable();
            $table->string('country')->nullable();
            $table->string('grewup')->nullable();

            $table->string('fatherstatus')->nullable();
            $table->string('motherstatus')->nullable();
            $table->string('brothers')->nullable();
            $table->string('sisters')->nullable();

            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('university')->nullable();
            $table->string('income')->nullable();
            $table->string('workingwith')->nullable();

            $table->string('userphone')->nullable();
            $table->string('userfacebook')->nullable();

            $table->text('testimonial')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('paying_amount')->nullable();
            $table->string('blnc_transection')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_exp')->nullable();

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
