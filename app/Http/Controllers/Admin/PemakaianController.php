<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.pemakaian.index', [
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
        return view('admin.pemakaian.create', [
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
            return redirect()->route('adminPemakaian.index');
        } else {
            session()->flash('success_msg', 'jumlah material lebih sedikit dari pemakaian.');
            return redirect()->route('adminPemakaian.create');
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
        $data = Pemakaian::findOrFail($id);
        return view('admin.pemakaian.update', [
            'title' => 'pemakaian',
            'subtitle'  => 'ubah',
            'active' => 'pemakaian.index',
            'data' => Material::all(),
            'base' => $data
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
        $data = Pemakaian::findOrFail($id);

        if ($data->material == $request->material) {
            if ($data->jumlah == $request->jumlah) {
                $data->update([
                    'tanggal' => $request->tanggal,
                    'material_id' => $data->material->id,
                    'jumlah' => $request->jumlah
                ]);
            }
        } else {
            $data->update([
                'tanggal' => $request->tanggal,
                'material_id' => $data->material->id,
                'jumlah' => $request->jumlah
            ]);
        }
        session()->flash('success_msg', 'Data Pemakaian Berhasil Dirubah.');
        return redirect()->route('adminPemakaian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemakaian::find($id);

        $data->delete();
        session()->flash('success_msg', 'Data Pemakaian Berhasil dihapus.');
        return redirect()->route('adminPemakaian.index');
    }
}
