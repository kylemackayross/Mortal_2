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
        Schema::create('passwords', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("service")->nullable();
            $table->string("address");
            $table->string("username");
            $table->string("new_password");
            $table->string("old_password")->nullable();
            $table->text("notes")->nullable();
            $table->string("client_id");
            $table->boolean('is_archived')->default(false);
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
        Schema::dropIfExists('passwords');
    }
};
