@extends('layouts.form')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah {{ucfirst($title)}}</h3>
            </div>
            <form id="materialCreate" method="post" action="{{ route('adminMaterial.update', $data->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">{{ __('Nama') }}</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" placeholder="{{$data->nama}}" value="{{$data->nama}}" autocomplete="nama"
                            autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="jumlah" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                            id="jumlah" placeholder="{{$data->jumlah}}" value="{{$data->jumlah}}"
                            autocomplete="new-jumlah">
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

@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        var submit = "{{ route('adminMaterial.update', $data->id) }}";
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
                        // console.log(dataResult);
                        alert( "Form successful submitted!" );
                    }
                })
            }
        });
        $('#materialCreate').validate({
            rules: {
                nama: {
                    required: true,
                    minlength: 3
                },
                jumlah: {
                    required: true,
                    min: 1,
                },
            },
            messages: {
                nama: {
                    required: "nama Kosong Harap di isi",
                    minlength: "nama kurang dari 3 karakter"
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
