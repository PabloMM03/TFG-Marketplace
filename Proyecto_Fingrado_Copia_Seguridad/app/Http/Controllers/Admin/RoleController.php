<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
      * Create Role Visualization View
      */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
      * Create Role Creation View
      */
    public function create()
    {
        $permisos = Permission::all();
        return view('admin.roles.create', compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Validate that the name field is filled in, if yes, the role is created
    public function store(Request $request)
    {
        //Validate fields
        $request->validate([
            'name' => 'required',

        ]);

       $role = Role::create($request->all());

       $role->permissions()->sync($request->permisos);

       return redirect()->route('admin.roles.edit', $role)->with('crear', 'Rol creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Role $role)
    {

        $permisos = Permission::all();
        return view('admin.roles.edit', compact('role', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

/**Update user roles, getting all roles and permissions */

    public function update(Request $request, Role $role)
    {
        //Validate fields
      $request->validate([
        'name' => 'required',
      ]);

      $role->update($request->all());

      $role->permissions()->sync($request->permisos);

      return redirect()->route('admin.roles.edit', $role)->with('actualizar', 'Rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //Delete the role
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('eliminar', 'Rol eliminado correctamente');
    }
}
