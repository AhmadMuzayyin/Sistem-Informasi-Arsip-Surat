<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class PositionController extends Controller
{
    public function index(){
        $data = Position::all();
        // return response()->json([
        //     'message' => 'Berhasil menampilkan semua data jabatan.',
        //     'users' => $data,
        // ], 200);
        return view('pages.jabatan.index', [
            'data' => $data
        ]);
    }
    public function show(Position $position){
        $data = Position::findOrFail($position->id);
        return response()->json([
            'message' => 'Berhasil menampilkan data jabatan.',
            'user' => $data->load('user'),
        ], 200);
    }
    public function create(){
        return view('pages.jabatan.create');
    }
    public function store(Request $request){
         $validator = Validator::make($request->all(), [
            'jabatan' => 'required',
        ]);
        if($validator->fails()){
            // return response()->json($validator->errors(), 400);
            return back()->with('error', 'Jabatan tidak boleh kosong');
        }
        try {
            $users = Position::create([
                'nama_posisi' => $request->jabatan
            ]);
            // $response = [
            //     'message' => 'Berhasil menambah data jabatan.',
            //     'data' => $users,
            // ];
            // return response()->json($response, 201);
            return back()->with('success', 'Berhasil menambah data jabatan.');
        } catch (QueryException $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->errorInfo,
            ], 500);
        }
    }
    public function update(Request $request){
        $data = Position::find($request->id);
        try {
            $data->update([
                'nama_posisi' => $request->posisi
            ]);
            // $response = [
            //     'message' => 'Berhasil merubah data jabatan.',
            //     'data' => $data,
            // ];
            // return response()->json($response, 200);
            return back()->with('success', 'Berhasil merubah data jabatan.');
        } catch (QueryException $th) {
            // return response()->json([
            //     'message' => 'Something went wrong',
            //     'error' => $th->errorInfo,
            // ], 500);
            return back()->with('error', 'Gagal merubah data jabatan.');
        }
    }
    public function destroy($id){
        $data = Position::findOrFail($id);
        $cekposisi = User::where('position_id', $id)->get();
        if(!$cekposisi->isEmpty()){
            return response()->json([
                'message' => 'Jabatan sedang digunakan.',
            ], 400);
        }
        try {
            $data->delete();
            // $response = [
            //     'message' => 'Berhasil menghapus data jabatan.',
            // ];
            // return response()->json($response, 201);
            return back()->with('success', 'Berhasil menghapus data jabatan.');
        } catch (QueryException $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->errorInfo,
            ], 500);
        }
    }
}
