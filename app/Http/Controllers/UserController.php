<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function loadUsers(){
        // Users::all();
        return Users::orderBy('id')->get();
    }

    public function searchUser(Request $request){
        $validate = $request->validate([
            'search' => 'required'
        ]);

        $search = $request->search;

       // return Users::where('name',$search)->orderBy('name')->get();
        return Users::where('name','like','%'.$search.'%')->orderBy('name')->get();
    }

    public function deleteUser(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        $id = $request->id;

        $users = Users::find($id);

        $users->delete();

        return response()->json(['result'=>true]);
    }

    public function addUser(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = new Users;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = '-';

        $user->save();
        return response()->json(['result'=>true]);
    }
}
