<?php

namespace App\Http\Controllers\Mandor;

use App\Http\Controllers\Controller;
use App\Material;
use App\Pemakaian;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mandor.pemakaian.index', [
            'title' => 'pemakaian',
            'subtitle'  => '',
            'active' => 'pemakaian.index',
            'data' => Pemakaian::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mandor.pemakaian.create', [
            'title' => 'pemakaian',
            'subtitle'  => 'tambah',
            'active' => 'pemakaian.index',
            'data' => Material::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Material::find($request->material);

        $request->validate([
            'tanggal' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);
        if ($data->jumlah > $request->jumlah) {
            $data->update([
                'jumlah' => $data->jumlah - $request->jumlah
            ]);
            Pemakaian::create([
                'tanggal' => $request->tanggal,
                'material_id' => $request->material,
                'jumlah' => $request->jumlah
            ]);
            session()->flash('success_msg', 'Data Pemakaian Berhasil Ditambah.');
            return redirect()->route('pemakaian.index');
        } else {
            session()->flash('success_msg', 'jumlah material lebih sedikit dari pemakaian.');
            return redirect()->route('pemakaian.create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
