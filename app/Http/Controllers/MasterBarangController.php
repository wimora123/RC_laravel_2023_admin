<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarangModel;
use Auth;
use Illuminate\Support\Facades\Validator;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Proses ambil barang
        $barang = MasterBarangModel::where('status', 1)->get();
        return view('master/barang/index',[
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master/barang/form_tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aturan = [
            'kode' => 'required|min:3|max:7|alpha_dash|unique:master_barang,kode',
            'barang' => 'required|min:10|max:25',
            'deskripsi' => 'required|max:255'
        ];

        $pesan_indo=[
            'required' => 'Wajib diisi',
            'min' => 'Minimal :min karakter',
            'unique' => 'Kode sudah dipakai'
        ];

        $validator = Validator::make($request->all(), $aturan, $pesan_indo);

        try{
            if($validator->fails()){
                return redirect()
                ->route('master_barang_create')
                ->withErrors($validator)->withInput();
            }else{
                $insert = MasterBarangModel::create([
                    'kode' => strtoupper($request->kode),
                    'nama' => $request->barang,
                    'deskripsi' => $request->deskripsi,
                    'id_kategori' => null,
                    'id_gudang' => null,
                    'waktu_dibuat' => date('Y-m-d H:i:s'),
                    'dibuat_oleh' => Auth::user()->id,
                    'diperbaharui_kapan' => null,
                    'diperbaharui_oleh' => null
                ]);

                // Jika proses insert berhasil
                if($insert){
                    return redirect()
                    ->route('master_barang')
                    ->with('success', 'Berhasil dimasukkan');
                }
            }


        }
        catch (\Throwable $e) {


            return redirect()
            ->route('master_barang_create')
            ->with('danger', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = MasterBarangModel::where('id', $id)->first();
        return view('master/barang/form_edit',[
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id=$request->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $update = MasterBarangModel::where(['id' => $id])->update([
                'status' => 0
            ]);

            if($update){
                return redirect()
                ->route('master_barang')
                ->with('success', 'Data berhasil dihapus');
            }


        }
        catch (\Throwable $e) {


            return redirect()
            ->route('master_barang')
            ->with('danger', $e->getMessage());
        }
    }
}
