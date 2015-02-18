<?php

class RoleTableSeeder extends Seeder {

	public function run()
	{
		Role::create([
			'nombre' => 'Administrador',
			'descripcion' => 'Es el que tiene control total de la aplicación'
		]);

		Role::create([
			'nombre' => 'Coordinador',
			'descripcion' => 'Control casi total de la aplicación, permisos especiales para aprobar y anular ordenes'
		]);

		Role::create([
			'nombre' => 'Asesor',
			'descripcion' => 'Rol enfocado a los asesores comerciales, que les permite registrar información y consultar listados de ordenes'
		]);

		Role::create([
			'nombre' => 'Asistente',
			'descripcion' => 'Rol para cargos operativos el cual solo permite acciones basicas en los diferentes modulos'
		]);
	}

}