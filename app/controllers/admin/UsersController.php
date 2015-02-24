<?php

class Admin_UsersController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => array('store','update')) );
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
   		return View::make('admin.users.index',compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = array('' => 'Por favor seleccione') + Role::lists('nombre','id');
		return View::make('admin.users.create',compact('roles'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if($this->validateForms(Input::all()) === true)
        {
			$user = new User;
			$user->nombres = Input::get('nombres');
			$user->apellidos = Input::get('apellidos');
			$user->usuario = Input::get('usuario');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->estado = Input::get('estado');
			$user->role_id = Input::get('role');
			$user->save();

			return Redirect::action('Admin_UsersController@index')->with('notice', 'El usuario ha sido creado correctamente.');
		}
		else
		{
            return Redirect::action('Admin_UsersController@create')->withErrors($this->validateForms(Input::all()))->withInput();
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return 'Aqui mostramos la info del usuario: ' . $id;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$roles = Role::lists('nombre','id');
		return View::make('admin.users.edit',compact('user','roles'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$user->nombres = Input::get('nombres');
		$user->apellidos = Input::get('apellidos');
		$user->usuario = Input::get('usuario');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->estado = Input::get('estado');
		$user->role_id = Input::get('role');
		$user->save();

		return Redirect::action('Admin_UsersController@index')->with('notice', 'El usuario ha sido modificado correctamente.');
	}


	/**
	 * Show the form for confirm delete the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function confirmDelete($user)
	{
		$user = User::find($user);
		return View::make('admin.users.delete',compact('user'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$id = Input::get('user');
        $user = User::findOrFail($id);
        $user->delete();

        return Redirect::action('Admin_UsersController@index')->with('notice', 'El usuario ha sido eliminado correctamente.');
	}



	//Método privado para validar los formularios, al fin y al cabo, siempre son iguales reutilización de código
    private function validateForms($inputs = array())
    {
        $rules = array(
			'nombres'   => 'required|alpha',
			'apellidos' => 'required|alpha',
			'usuario'   => 'required|alpha_num',
			'email'     => 'required|email',
			'password'  => 'required|min:4',
			'role'      => 'required'
        );
            
        $messages = array(
			'required'          => 'El campo :attribute es obligatorio.',
			'password.required' => 'Por favor ingrese una contraseña.',
			'role.required'     => 'Por favor seleccione el rol de este usuario.',
			'alpha'             => 'El campo :attribute debe contener solo letras.',
			'alpha_num'         => 'El campo :attribute debe contener solo letras y números.',
			'email'             => 'El campo :attribute debe ser un correo electrónico válido.',
			'password.min'      => 'La contraseña debe tener más de :min carácteres.'
        );
    
        $validation = Validator::make($inputs, $rules, $messages);
 
        if($validation->fails())
        {
            return $validation;
        }else{
            return true;
        }
    }

}
