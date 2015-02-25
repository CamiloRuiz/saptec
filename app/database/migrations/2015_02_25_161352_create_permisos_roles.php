<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permisos_roles', function(Blueprint $table)
		{
			$table->integer('permiso_id')->unsigned();
            $table->foreign('permiso_id')->references('id')->on('permisos');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permisos_roles');
	}

}
