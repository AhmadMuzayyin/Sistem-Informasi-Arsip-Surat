<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\IncomingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IncomingMailController extends Controller
{
    public function index(){
        $data = IncomingMail::all();
        // return response()->json([
        //     'message' => 'Berhasil menampilkan semua data surat keluar.',
        //     'users' => $data,
        // ], 200);
        return view('pages.surat.masuk.index', compact('data'));
    }
    public function edit($id){
        $data = Institution::all();
        $surat = IncomingMail::findOrFail($id);
        return view('pages.surat.masuk.edit', compact(['surat', 'data']));
        // if ($data) {
        //     return response()->json([
        //         'message' => 'Berhasil menampilkan data masuk keluar.',
        //         'user' => $data->load('institution'),
        //     ], 200);
        // }
        // return response()->json([
        //     'message' => 'Data surat masuk tidak ditemukan.',
        // ]);
    }
    public function create(){
        $data = Institution::all();
        return view('pages.surat.masuk.create', compact('data'));
    }
    public function store(Request $request){
         $request->validate([
             'pengirim' => 'required',
             'file' => 'required',
             'jenis_surat' => 'required',
             'perihal' => 'required',
             'nomor' => 'required',
             'tanggal' => 'required',
             'tujuan' =>'required',
             'perihal' => 'required'
        ]);
        // if($validator->fails()){
        //     return response()->json($validator->errors(), 400);
        // }
        try {
            $file = $request->file('file');
            $gambar = 'user_name'. now()->format('d-M-Y').time().'.'.$file->getClientOriginalExtension();
            $request->file('file')->storeAs('public/uploads', $gambar);
            IncomingMail::create([
                'institution_id' => $request->pengirim,
                'tanggal_masuk' => $request->tanggal ?? now()->format('Y-m-d'),
                'jenis_surat' => $request->jenis_surat,
                'nomor_surat' => $request->nomor,
                'perihal' => $request->perihal,
                'lampiran' => $request->lampiran,
                'tujuan' => $request->tujuan,
                'cq' => $request->cq,
                'tembusan' => $request->tembusan,
                'file_name' => $gambar,
            ]);
            // $response = [
            //     'message' => 'Berhasil menambah data surat masuk.',
            //     'data' => $users,
            // ];
            // return response()->json($response, 201);
            return redirect('/incomingmail')->with('success', 'Surat masuk berhasil ditambahkan.');
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
            if ($request->file('file') != null) {
                $file = $request->file('file');
                $gambar = 'user_name'. now()->format('d-M-Y').time().'.'.$file->getClientOriginalExtension();
                $request->file('file')->storeAs('public/uploads', $gambar);
                $data->update([
                    'institution_id' => $request->pengirim,
                    'tanggal_masuk' => $request->tanggal ?? now()->format('Y-m-d'),
                    'jenis_surat' => $request->jenis_surat,
                    'nomor_surat' => $request->nomor,
                    'perihal' => $request->perihal,
                    'lampiran' => $request->lampiran,
                    'tujuan' => $request->tujuan,
                    'cq' => $request->cq,
                    'tembusan' => $request->tembusan,
                    'file_name' => $gambar,
                ]);
            }
            $data->update([
                'institution_id' => $request->pengirim,
                'tanggal_masuk' => $request->tanggal ?? now()->format('Y-m-d'),
                'jenis_surat' => $request->jenis_surat,
                'nomor_surat' => $request->nomor,
                'perihal' => $request->perihal,
                'lampiran' => $request->lampiran,
                'tujuan' => $request->tujuan,
                'cq' => $request->cq,
                'tembusan' => $request->tembusan,
            ]);
            return redirect('/incomingmail')->with('success', 'Berhasil merubah data surat masuk.');
            // $response = [
            //     'message' => 'Berhasil merubah data surat masuk.',
            //     'data' => $data,
            // ];
            // return response()->json($response, 200);
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
            File::delete(public_path('storage/uploads/'.$data->file_name));
            $data->delete();
            // $response = [
            //     'message' => 'Berhasil menghapus data surat masuk.',
            // ];
            // return response()->json($response, 201);
            return back()->with('success', 'Surat masuk berhasil dihapus.');
        } catch (QueryException $th) {
            // return response()->json([
            //     'message' => 'Something went wrong',
            //     'error' => $th->errorInfo,
            // ], 500);
            return back()->with('success', $th->errorInfo);
        }
    }
}
