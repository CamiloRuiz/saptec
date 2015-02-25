<?php

class Admin_PermisosController extends \BaseController {

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
		$permisos = Permiso::all();
   		return View::make('admin.permisos.index',compact('permisos'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.permisos.create');
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
			$permiso = new Permiso;
			$permiso->descripcion = Input::get('descripcion');
			$permiso->controller = Input::get('controller');
			$permiso->action = Input::get('action');
			$permiso->save();

			return Redirect::action('Admin_PermisosController@index')->with('notice', 'El permiso ha sido creado correctamente.');
		}
		else
		{
            return Redirect::action('Admin_PermisosController@create')->withErrors($this->validateForms(Input::all()))->withInput();
        }
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permiso = Permiso::find($id);
		return View::make('admin.permisos.edit',compact('permiso'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if($this->validateForms(Input::all()) === true)
        {
			$permiso = Permiso::findOrFail($id);

			$permiso->descripcion = Input::get('descripcion');
			$permiso->controller = Input::get('controller');
			$permiso->action = Input::get('action');
			$permiso->save();

			return Redirect::action('Admin_PermisosController@index')->with('notice', 'El permiso ha sido modificado correctamente.');
		}
		else
		{
            return Redirect::action('Admin_PermisosController@edit', array($id))->withErrors($this->validateForms(Input::all()))->withInput();

        }
	}


	/**
	 * Show the form for confirm delete the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function confirmDelete($permiso)
	{
		$permiso = User::find($permiso);
		return View::make('admin.permisos.delete',compact('permiso'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $permiso = Permiso::findOrFail($id);
        $permiso->delete();

        return Redirect::action('Admin_PermisosController@index')->with('notice', 'El permiso ha sido eliminado correctamente.');
	}


	//Método privado para validar los formularios, al fin y al cabo, siempre son iguales reutilización de código
    private function validateForms($inputs = array())
    {
        $rules = array(
			'descripcion' => 'required|alpha_spaces',
			'controller'  => 'required|alpha',
			'action'      => 'required|alpha'
        );
    
        $validation = Validator::make($inputs, $rules);
 
        if($validation->fails())
        {
            return $validation;
        }else{
            return true;
        }
    }

}
