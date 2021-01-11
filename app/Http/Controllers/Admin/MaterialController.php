<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.material.index', [
            'title' => 'Material',
            'subtitle'  => '',
            'active' => 'material.index',
            'data' => Material::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.material.create', [
            'title' => 'material',
            'subtitle'  => 'tambah',
            'active' => 'material.index',
            // 'data' => User::where('role', 'mandor')->get()
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:1',
        ]);

        $data = Material::create([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah
        ]);

        $data->update([
            'kode' => "M" . $data->id
        ]);

        session()->flash('success_msg', 'Data Material Berhasil Ditambah.');
        return redirect()->route('adminMaterial.index');
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
        $data = Material::findOrFail($id);

        return view('admin.material.update', [
            'title' => 'material',
            'subtitle'  => 'ubah',
            'active' => 'material.index',
            'data' => $data
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
        $data = Material::findOrFail($id);
        $data->update([
            'nama' => $request->nama,
            'jumlah' => $request->jumlah
        ]);
        session()->flash('success_msg', 'Data Material Berhasil Dirubah.');
        return redirect()->route('adminMaterial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Material::find($id);

        $data->delete();
        session()->flash('success_msg', 'Data Material Berhasil dihapus.');
        return redirect()->route('adminMaterial.index');
    }
}
