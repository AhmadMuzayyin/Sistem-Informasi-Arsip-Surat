<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use App\Models\UserDetail;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        // return response()->json([
        //     'message' => 'Berhasil menampilkan semua data user.',
        //     'users' => $users,
        // ], 200);
        return view('pages.users.index', [
            'users' => $users,
        ]);
    }
    public function create(){
        // return response()->json([
        //     'message' => 'Berhasil menampilkan semua data user.',
        //     'users' => $users,
        // ], 200);
        $position = Position::all();
        $institution = Institution::all();
        return view('pages.users.create', [
            'position' => $position,
            'institution' => $institution,
        ]);
    }
    public function show(User $user){
        $data = User::findOrFail($user->id);
        return response()->json([
            'message' => 'Berhasil menampilkan data user.',
            'user' => $data->load('position'),
        ], 200);
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate( [
            'lembaga' => 'required',
            'jabatan' => 'required',
            'username' => 'required|string|max:255|unique:users',
            'fullname' => 'required|string|max:255',
            // 'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        // if($validator->fails()){
        //     // return response()->json($validator->errors(), 400);
        //     return back()->withInput()->with($validator->errors());
        // }
        try {
            $users = User::create([
                'institution_id' => $request->lembaga,
                'position_id' => $request->jabatan,
                'username' => $request->username,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            UserDetail::create([
                'user_id' => $users->id,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'foto' => 'default.jpg'
            ]);
            // $response = [
            //     'message' => 'Berhasil menambah data user.',
            //     'data' => $users,
            // ];
            // return response()->json($response, 201);
            return redirect('/user')->with('success', 'Berhasil menambahkan data user.');
        } catch (QueryException $th) {
            // return response()->json([
            //     'message' => 'Something went wrong',
            //     'error' => $th->errorInfo,
            // ], 500);
            return back()->with('error', $th->errorInfo);
        }
    }
    public function edit(User $user){
        $data = User::where('id', $user->id)->get();
        $position = Position::all();
        $institution = Institution::all();
        return view('pages.users.edit', [
            'data' => $data,
            'position' => $position,
            'institution' => $institution,
        ]);
    }
    public function update(Request $request, User $user){
        // dd($request->all());
        $user = User::find($user->id);
        try {
            $password = $request->password != "" ? bcrypt($request->password) : $user->password;
            $user->update([
                'institution_id' => $request->institution_id ? $request->institution_id : $user->institution_id,
                'position_id' => $request->position_id ? $request->position_id : $user->position_id,
                'username' => $request->username,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'password' =>  $password,
            ]);
            $detail = UserDetail::where('user_id', $user->id)->first();
            $detail->update([
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'foto' => $request->foto ? $request->foto : 'default.png',
            ]);
            // $response = [
            //     'message' => 'Update data berhasil.',
            //     'data' => $user,
            // ];
            // return response()->json($response, 200);
            return redirect('/user')->with('success', 'Berhasil merubah data user.');
        } catch (QueryException $th) {
            // return response()->json([
            //     'message' => 'Something went wrong',
            //     'error' => $th->errorInfo,
            // ], 500);
            return back()->with('error', $th->errorInfo);
        }
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        try {
            $user->delete();
            UserDetail::where('user_id', $id)->delete();
            // $response = [
            //     'message' => 'Berhasil menghapus data user.',
            // ];
            return back()->with('success', 'Berhasil menghapus data user.');
        } catch (QueryException $th) {
            // return response()->json([
            //     'message' => 'Something went wrong',
            //     'error' => $th->errorInfo,
            // ], 500);
            return back()->with('error', $th->errorInfo);
        }
    }
}
