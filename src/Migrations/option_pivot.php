<?php 

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Schema;

class CreateOptionPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{ 
        // Creates the option pivot relation table
       	Schema::create('option_pivot', function (Blueprint $table) {
        	
    		$table->integer('option_id');
        	$table->integer('model_id');
        	$table->integer('model_type');
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('option_pivot');
	}

}