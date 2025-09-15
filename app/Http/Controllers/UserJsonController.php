<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserJsonController extends Controller
{
    public function index(Request $request)
    {
        // Fetch only specified fields
        $users = User::select('name', 'email', 'status', 'password')->get();

        return response()->json([
            'success' => true,
            'data'    => $users->map(function ($user) {
                return [
                    'name'     => $user->name,
                    'email'    => $user->email,
                    'status'   => $user->status,
                    'password' => $user->password, // ⚠️ consider removing for security
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ];
            }),
            'count'   => $users->count()
        ]);
    }

    public function show($id)
    {
        $user = User::select('*')->find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => [
                'id'       => $user->id,
                'name'     => $user->name,
                'email'    => $user->email,
                'status'   => $user->status,
                'password' => $user->password, // ⚠️ security risk
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]
        ]);
    }

    public function byStatus($status)
    {
        $users = User::select('*')
            ->where('status', $status)
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $users->map(function ($user) {
                return [
                    'name'     => $user->name,
                    'email'    => $user->email,
                    'status'   => $user->status,
                    'password' => $user->password,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ];
            }),
            'count'   => $users->count()
        ]);
    }
}
