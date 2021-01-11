@extends('layouts.form')
@section('content')
@include('components.success_msg')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah {{ucfirst($title)}}</h3>
            </div>
            <form id="materialCreate" method="post" action="{{ route('adminPemakaian.update', $base->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="tanggal">{{ __('Tanggal') }}</label>
                        <input type="text" name="tanggal" class="form-control" value="{{$base->tanggal}}" id="tanggal"
                            data-date-format="yyyy/mm/dd" />
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="material">Material</label>
                        <select class="custom-select" name="material" id="material">
                            <option value="{{$base->material->id}}">{{$base->material->nama}} dipinjam =
                                {{$base->jumlah}}</option>
                            @foreach ($data as $k)
                            <option value="{{$k->id}}">{{$k->nama}}, sisa = {{$k->jumlah}}</option>
                            @endforeach
                        </select>
                        @error('material')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                            id="jumlah" placeholder="Jumlah" value="{{$base->jumlah}}" autocomplete="new-jumlah">
                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
@endpush

@push('js')
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
@endpush

@push('script')
<script type="text/javascript">
    $('#tanggal').datepicker({
        autoclose: true,
    });

    $(document).ready(function () {
        var submit = "{{ route('adminPemakaian.update', $base->id) }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.validator.setDefaults({
            submitHandler: function () {
                $.ajax({
                    url: submit,
                    method: 'POST',
                    data: {
                        nama: nama,
                        jumlah: jumlah,
                    },
                    cache: false,
                    success: function(dataResult){
                        alert( "Form successful submitted!" );
                    }
                })
            }
        });
        $('#materialCreate').validate({
            rules: {
                tanggal: {
                    required: true,
                },
                material: {
                    required: true,
                },
                jumlah: {
                    required: true,
                    min: 1,
                },
            },
            messages: {
                tanggal: {
                    required: "Tanggal Kosong Harap di isi",
                },
                material: {
                    required: "Material Kosong Harap di isi",
                },
                jumlah: {
                    required: "jumlah Kosong Harap di isi",
                    min: "harus lebih besar dari 0",
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
        });
    });
</script>
@endpush
