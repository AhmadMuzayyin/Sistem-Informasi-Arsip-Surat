<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class LetterController extends Controller
{
    public function index(){
        $data = Letter::all();
        // return response()->json([
        //     'message' => 'Berhasil menampilkan semua data surat keluar.',
        //     'users' => $data,
        // ], 200);
        return view('pages.surat.masuk.index', [
            'data' => $data
        ]);
    }
    function create(){
        $data = Institution::all();
        return view("pages.surat.masuk.create", [
            'data' => $data
        ]);
    }
    public function show($id){
        $data = Letter::findOrFail($id);
        return response()->json([
            'message' => 'Berhasil menampilkan data surat keluar.',
            'user' => $data->load('institution'),
        ], 200);
    }

    public function store(Request $request){
        // dd($request->all());
         $request->validate([
            'kop' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'waktu' => 'required',
            'pembukaan' => 'required',
            'penutup' => 'required',
            'penutup' => 'required',
            'nama' => 'required',
        ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors(), 400);
        // }
        try {
            $users = Letter::create([
                'institution_id' => $request->kop,
                'nomor_surat' => $request->no,
                'lampiran' => $request->lampiran,
                'perihal' => $request->perihal,
                'tujuan' => $request->tujuan,
                'start_surat' => $request->pembukaan,
                'tgl_pelaksanaan' => $request->tanggal,
                'waktu_pelaksanaan' => $request->waktu,
                'tempat_pelaksanaan' => $request->tempat,
                'end_surat' => $request->penutup,
                'lokasi_pembuatan' => $request->tempat_pembuatan,
                'nama_pembuat' => $request->nama,
                'nip_pembuat' => $request->nip
            ]);
            // $response = [
            //     'message' => 'Berhasil menambah data surat keluar.',
            //     'data' => $users,
            // ];
            // return response()->json($response, 201);
            return redirect('/letter')->with('success', 'Berhasil menambah data surat masuk.');
        } catch (QueryException $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->errorInfo,
            ], 500);
        }
    }
    public function update(Request $request, Letter $Letter){
        $data = Letter::find($Letter->id);
        try {
            $data->update($request->all());
            $response = [
                'message' => 'Berhasil merubah data surat keluar.',
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
        $data = Letter::findOrFail($id);
        try {
            $data->delete();
            $response = [
                'message' => 'Berhasil menghapus data surat keluar.',
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
