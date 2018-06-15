<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIssuesTable.
 */
class CreateIssuesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issues', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->string('title', 150);
            $table->longText('description');
            $table->string('category');
            $table->string('level');
            $table->string('status')->default(0);
            $table->decimal('value', 10, 2)->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('issues');
	}
}
