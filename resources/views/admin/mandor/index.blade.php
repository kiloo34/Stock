@extends('layouts.table')
@section('content')
@include('components.success_msg')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar {{ucfirst($title)}}</h3>
                <a href="{{ route('mandor.create') }}" role="button" class="btn btn-sm btn-primary"
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
                            <th>Email</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($data as $k)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$k->email}}</td>
                            <td>{{$k->nama}}</td>
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
