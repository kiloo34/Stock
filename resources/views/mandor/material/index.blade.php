@extends('layouts.table')
@section('content')
@include('components.success_msg')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar {{ucfirst($title)}}</h3>
            </div>
            <div class="card-body">
                <table id="dt" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
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
