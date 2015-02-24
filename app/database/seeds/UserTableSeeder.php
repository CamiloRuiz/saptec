<?php
 
use Illuminate\Support\Facades\Hash;
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        User::create([
            'nombres' => 'System',
            'apellidos'  => 'Administrator',
            'usuario'   => 'admin',
            'email'      => 'crshadow18@gmail.com',
            'password'   =>  Hash::make('admin'),
            'estado'    => '1',
            'role_id'    => '1'
        ]);
    }
 
}