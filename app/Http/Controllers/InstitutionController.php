<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index(){
        $data = Institution::all();
        return view('pages.lembaga.index', [
            'data' => $data
        ]);
    }

    public function create(){
        return view('pages.lembaga.create');
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:institutions',
            'kode_pos' => 'required',
            'telepon' => 'required',
            'logo' => 'required'
        ]);
        try {
                Institution::create([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'kode_pos' => $request->kode_pos,
                    'telepon' => $request->telepon,
                    'email' => $request->email,
                    'fax' => $request->fax,
                    'logo' => 'logo.jpg',
                ]);
                return redirect('/institution')->with('success', 'Berhasil menambah data lembaga.');
        } catch (QueryException $th) {
               return back()->with('error', $th->errorInfo);
        }
    }

    public function edit($id){
        $data = Institution::where('id', $id)->get();
        return view('pages.lembaga.edit', [
            'data' => $data
        ]);
    }
    public function update(Request $request, $id){
        $data = Institution::findOrFail($id);
        try {
            $data->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'telepon' => $request->telepon,
                'email' => $request->email,
                'fax' => $request->fax,
                'logo' => 'logo.jpg',
            ]);
            return redirect('institution')->with('success', 'Berhasil merubah data lembaga.');
        } catch (QueryException $th) {
            return back()->with('error', $th->errorInfo);
        }
    }
    public function destroy($id){
        $data = Institution::findOrFail($id);
        try {
            $data->delete();
            return back()->with('success', 'Berhasil menghapus data lembaga.');
        } catch (QueryException $th) {
            return back()->with('error', $th->errorInfo);
        }
    }
}
