<?php

namespace App\Http\Controllers;

use App\Models\IncomingMail;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class IncomingMailController extends Controller
{
    public function index(){
        $data = IncomingMail::all();
        return response()->json([
            'message' => 'Berhasil menampilkan semua data surat keluar.',
            'users' => $data,
        ], 200);
    }
    public function show($id){
        $data = IncomingMail::find($id);
        if ($data) {
            return response()->json([
                'message' => 'Berhasil menampilkan data masuk keluar.',
                'user' => $data->load('institution'),
            ], 200);
        }
        return response()->json([
            'message' => 'Data surat masuk tidak ditemukan.',
        ]);
    }
    public function store(Request $request){
         $validator = Validator::make($request->all(), [
            'file_name' => 'required|unique:incoming_mails',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        try {
            $users = IncomingMail::create([
                'institution_id' => $request->institution_id,
                'file_name' => $request->file_name,
                'tanggal_masuk' => $request->tanggal_masuk ? $request->tanggal_masuk : now()->format('Y-m-d'),
            ]);
            $response = [
                'message' => 'Berhasil menambah data surat masuk.',
                'data' => $users,
            ];
            return response()->json($response, 201);
        } catch (QueryException $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->errorInfo,
            ], 500);
        }
    }
    public function update(Request $request, IncomingMail $incomingmail){
        $data = IncomingMail::find($incomingmail->id);
        try {
            $data->update($request->all());
            $response = [
                'message' => 'Berhasil merubah data surat masuk.',
                'data' => $data,
            ];
            return response()->json($response, 200);
        } catch (QueryException $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->errorInfo,
            ], 500);
        }
    }
    public function destroy($id){
        $data = IncomingMail::findOrFail($id);
        try {
            $data->delete();
            $response = [
                'message' => 'Berhasil menghapus data surat masuk.',
            ];
            return response()->json($response, 201);
        } catch (QueryException $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->errorInfo,
            ], 500);
        }
    }
}
