<?php

class Admin_RolesController extends \BaseController {

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
		$roles = Role::all();
   		return View::make('admin.roles.index',compact('roles'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.roles.create');
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
			$role = new Role;
			$role->nombre = Input::get('nombre');
			$role->descripcion = Input::get('descripcion');
			$role->save();

			return Redirect::action('Admin_RolesController@index')->with('notice', 'El rol ha sido creado correctamente.');
		}
		else
		{
            return Redirect::action('Admin_RolesController@create')->withErrors($this->validateForms(Input::all()))->withInput();
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
		$role = Role::find($id);
		return View::make('admin.roles.edit',compact('role'));
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
			$role = Role::findOrFail($id);

			$role->nombre = Input::get('nombre');
			$role->descripcion = Input::get('descripcion');
			$role->save();

			return Redirect::action('Admin_RolesController@index')->with('notice', 'El rol se modificó correctamente.');
		}
		else
		{
            return Redirect::action('Admin_RolesController@edit', array($id))->withErrors($this->validateForms(Input::all()))->withInput();

        }
	}


	/**
	 * Show the form for confirm delete the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function confirmDelete($role)
	{
		$role = Role::find($role);
		return View::make('admin.roles.delete',compact('role'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::findOrFail($id);
        $role->delete();

        return Redirect::action('Admin_RolesController@index')->with('notice', 'El role ha sido eliminado correctamente.');
	}


	/**
	 * Show the form for manage the permissions to the specific role.
	 *
	 * @param  int  $role
	 * @return Response
	 */
	public function managePermisos($role)
	{
		$role = Role::find($role);
		$controladores = Permiso::orderBy('controller', 'asc')->groupBy('controller')->get();
		$permisos = Permiso::orderBy('action', 'asc')->get();
		return View::make('admin.roles.permisos',compact('role','controladores','permisos'));
	}



	/**
	 * Update the permissions to the specific role.
	 *
	 * @param  int  $role
	 * @return Response
	 */
	public function updatePermisos($role)
	{
		$role = Role::find($role);
		/*$permisos = Permiso::all();
		return View::make('admin.roles.permisos',compact('role','permisos'));*/
		$permisos = Input::all();
		$respuesta = "";
		foreach ($permisos as $i => $permiso) {
			if($i != "_token")
			{	
				$ruta = explode("@", $i);
				$data_permiso = Permiso::where('controller','=',$ruta[0])->where('action','=',$ruta[1])->first();
				$role->permisos()->attach(array($data_permiso->id));
			}
		}

		// return $respuesta;
		$controladores = Permiso::orderBy('controller', 'asc')->groupBy('controller')->get();
		$info_permisos = Permiso::orderBy('action', 'asc')->get();
		return Redirect::action('Admin_RolesController@managePermisos',array($role))->with('notice', 'Se actualizaron los permisos del rol correctamente.')->with('controladores',$controladores)->with('permisos',$info_permisos);
	}


	//Método privado para validar los formularios, al fin y al cabo, siempre son iguales reutilización de código
    private function validateForms($inputs = array())
    {
        $rules = array(
			'nombre' => 'required|alpha_spaces'
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
