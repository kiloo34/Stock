@extends('layouts.table')
@section('content')
@include('components.success_msg')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar {{ucfirst($title)}}</h3>
                <a href="{{ route('adminMaterial.create') }}" role="button" class="btn btn-sm btn-primary"
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($data as $k)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$k->kode}}</td>
                            <td>{{$k->nama}}</td>
                            <td>{{$k->jumlah}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{ route('adminMaterial.edit', $k->id) }}"
                                        class="btn btn-sm btn-info mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('adminMaterial.destroy', [$k->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-sm btn-danger"> <i
                                                class="fas fa-trash"></i></button>
                                    </form>
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
