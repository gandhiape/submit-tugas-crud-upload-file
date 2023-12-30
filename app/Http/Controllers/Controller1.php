<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class Controller1 extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function update($nim)
    {
       if($data=Mahasiswa::find($nim)){
        return view('update',['data'=>$data]);
       }else return redirect('/read');
    }

    public function edit(Request $request)
    {
        if($data=Mahasiswa::find($request->nim)){
            $data->nama = $request->nama;
            $data->umur = $request->umur;
            $data->email = $request->umur;
            $data->alamat = $request->alamat;

            if ($request->hasFile('gambar')) {
                if ($data->gambar) {
                    Storage::delete($data->gambar);
                }

                $gambar = $request->file('gambar');
                $gambarName = time().''.$gambar->getClientOriginalExtension();
                $gambar->storeAs('public/gambar', $gambarName);
                $data->gambar = $gambarName;
            }
            
            $data->update_at=date('Y-m-d H:i:s');
            $data->save();
            return redirect('/read')->with('pesan','data dengan NIM : '.$request->nim.'berhasil diupdate');
        
        }else{
            return redirect('/read')->with('pesan','data tidak ditemukan/gagal diupdate');
            
        }

    }
    public function save(Request $request)
    {
        $validateData = $request->validate([
            'nim'=>'required|regex:/^G.\d{3}.\d{2}.\d{4}$/|unique:mahasiswa,nim',
            'nama'=>'required|string|max:35',
            'gambar'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'umur'=>'required|integer|between:1,100',
            'alamat'=>'required|min:6',
            'email'=>'required|email'
        ]);

        $model = new Mahasiswa();

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/gambar', $gambarName);
            $model->gambar = $gambarName;
        }

        $model->nim = $request->nim;
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->umur = $request->umur;
        $model->email = $request->email;
        $model->created_at = date("Y-m-d H:i:s");

        $model->save();

        return view('view',['data'=>$request->all()]);
    }

    public function read()
    {
        $model = new Mahasiswa();
        $dataAll=$model->all();
        return view('read',['dataAll'=>$dataAll]);
    }
    public function delete($nim)
    {
        $data = Mahasiswa::find($nim);

        if ($data) {
            // Delete the associated file
            if ($data->gambar) {
                Storage::delete($data->gambar);
            }

            $data->delete();
        } else {
            return redirect('/read')->with('pesan', 'Data NIM : ' . $nim . ' tidak ditemukan');
        }

        return redirect('/read')->with('pesan', 'Data NIM:' . $nim . ' Berhasil dihapus');
    }

    
    public function tampilkan(Request $request)
    {
        $model = new Mahasiswa();
        $model::insert(['nim'=>@$request->nim, 'nama'=>@$request->nama, 'alamat' =>@$request->alamat]);

        return view('tampil2',['data'=>$request->all()]);
    }

    public function logout()
    {
        return view('logout');
    }
}