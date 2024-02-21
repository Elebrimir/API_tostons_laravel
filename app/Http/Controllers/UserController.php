<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Verificar si el parámetro 'per_page' está presente en la consulta
        $perPage = $request->query('per_page', 10);

        // Obtener todos los usuarios con la posibilidad de paginarlos
        $usersQuery = User::query();

        // Verificar si los parámetros 'order_by' y 'order_direction' están presentes en la consulta
        if ($request->has('order_by') || $request->has('order_direction')) {
            // Obtener la columna de ordenación y dirección de la consulta
            $column = $request->query('order_by', 'id');
            $direction = $request->query('order_direction', 'asc');

            // Verificar que la columna proporcionada sea válida
            $allowedColumns = ['id', 'name', 'surname', 'nickname', 'email', 'roles']; // Agrega más columnas permitidas si es necesario
            if (in_array($column, $allowedColumns)) {
                // Aplicar la ordenación según los parámetros proporcionados
                $usersQuery->orderBy($column, $direction);
            } else {
                // Si la columna no es válida, ordenar por defecto por 'id' de forma ascendente
                $usersQuery->orderBy('id', 'asc');
            }
        }

        // Obtener los usuarios paginados y ordenados según los parámetros de la consulta
        $users = $usersQuery->paginate($perPage);

        // Devolver la lista de usuarios paginada y ordenada como una respuesta JSON
        return response()->json($users);
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->phoneNumber = $request->phonenumber;
        $user->password =  bcrypt($request->password);
        $user->roles = $request->roles;
        $user->save();

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            ...$request->all(),
            ...$request->validate([
                'name' => 'string',
                'surname' => 'string',
                'nickname' => 'string',
                'roles' => 'string',
                'phoneNumber' => 'string',
                'email' => 'email',
            ])
        ]);

        return response()->json(['message' => 'Usuario actualizado correctamente', 'user' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'Usuario Eliminado',
            'user' => $user
        ]);
    }
}
