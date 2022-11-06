<?php


namespace App\Http\Controllers\RestAPI;


use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    public function create (Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
    }

    public function getAll(){
        $users = User::all()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function get($id){
        $users = User::find($id)->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

   /* public function createUser(){

    }*/

    public function update(Request $request, $id){
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);

            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    public function delete($id){
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user -> delete();

            return response()->json([
                "message" => "records deleted"
            ], 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }
}
