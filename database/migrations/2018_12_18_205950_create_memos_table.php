<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class CreateMemosTable.
 */
class CreateMemosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('from');
            $table->timestamp('date');
            $table->text('body');
            $table->timestamps();
        });


        Schema::create('department_memo', function (Blueprint $table) {
           $table->unsignedInteger('memo_id')->index();
           $table->unsignedInteger('department_id')->index();
           $table->timestamps();

           $table->foreign('memo_id')->references('id')->on('memos')->onDelete('cascade');
           $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

           $table->primary(['memo_id', 'department_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('memos');
        Schema::drop('department_memo');
    }
}
