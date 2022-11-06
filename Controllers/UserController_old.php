<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserControllerOld extends Controller
{

    //ВЫВОД ВСЕХ ПОЛЬЗОВАТЕЛЕЙ
    public function index(){
        $users = User::all();
       // $users = DB::table('users') -> get();

        return view('users.index', compact('users'));
    }

    //Вывод формы для создания пользователей
    public function create()
    {
        return view('users.create');
    }

    //ХРАНЕНИЕ СОЗДАННЫХ ЗАПИСЕЙ
   public function store (Request $request){
       $request->validate([
           'name' => 'required',
           'email' => 'required',
           'password' => 'required',
       ]);

       User::create($request->post());

       return redirect()->route('users.index')->with('success','User has been created successfully.');
   }

   //
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function update (Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $user->fill($request->post())->save();

        return redirect()->route('users.index')->with('success','User Has Been updated successfully');
    }

    public function delete (Request $request, User $user){
        $user -> delete();

        return redirect()->route('users.index')->with('success','User Has Been deleted successfully');
    }
}
