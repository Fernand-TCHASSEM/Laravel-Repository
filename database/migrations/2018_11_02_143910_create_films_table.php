<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false)->unique();
            $table->string('slug')->nullable(false)->unique();
            $table->text('description')->nullable(false);
            $table->timestamp('release_date')->nullable(false);
            $table->enum('rating', [1, 2, 3, 4, 5])->nullable(false);
            $table->float('ticket_price', 8, 2)->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('photo')->nullable(false);
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
        Schema::dropIfExists('films');
    }
}
