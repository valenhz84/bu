<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('parent')->nullable();
            $table->text('description')->nullable();
            $table->text('solution')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('status')->default(0);
            $table->integer('from')->nullable();
            
            // fk
            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')
                    ->references('id')
                    ->on('periods');
            // fk
            $table->bigInteger('activitie_id')->unsigned();
            $table->foreign('activitie_id')
                    ->references('id')
                    ->on('activities');
            // fk
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
