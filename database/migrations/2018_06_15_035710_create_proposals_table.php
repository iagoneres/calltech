<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProposalsTable.
 */
class CreateProposalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proposals', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('provider_id');
            $table->unsignedInteger('user_id');
            $table->tinyInteger('status');
            $table->decimal('value', 10, 2);

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
		Schema::drop('proposals');
	}
}
