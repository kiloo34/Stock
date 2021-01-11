@extends('layouts.table')
@section('content')
@include('components.success_msg')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar {{ucfirst($title)}}</h3>
                <a href="{{ route('pemakaian.create') }}" role="button" class="btn btn-sm btn-primary"
                    style="float: right">
                    <i class="nav-icon fas fa-plus"></i>
                    Tambah Data {{ucfirst($title)}}
                </a>
            </div>
            <div class="card-body">
                <table id="dt" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Material</th>
                            <th>Nama Material</th>
                            <th>Jumlah Material</th>
                            <th>Tanggal Pemakaian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($data as $k)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$k->material->kode}}</td>
                            <td>{{$k->material->nama}}</td>
                            <td>{{$k->jumlah}}</td>
                            <td>{{$k->tanggal}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{ route('pemakaian.edit', $k->id) }}" class="btn btn-sm btn-info mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                            <?php $no++ ?>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
