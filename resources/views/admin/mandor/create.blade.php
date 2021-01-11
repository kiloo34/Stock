@extends('layouts.form')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah {{ucfirst($title)}}</h3>
            </div>
            <form id="mandorCreate" method="post" action="{{ route('mandor.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Masukan email" value="{{ old('nama') }}" autocomplete="email"
                            autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">{{ __('Nama') }}</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" placeholder="Masukan nama" value="{{ old('nama') }}" autocomplete="nama"
                            autofocus>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" autocomplete="new-password">
                        @error('password')
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
        var submit = "{{ route('mandor.store') }}";
        var redirect = "{{ route('mandor.index') }}"
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
                        email: email,
                        password: password,
                    },
                    cache: false,
                    success: function(dataResult){
                        // console.log(dataResult);
                        alert( "Form successful submitted!" );
                    }
                })
            }
        });
        $('#mandorCreate').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                nama: {
                    required: true,
                    minlength: 5
                },
            },
            messages: {
                email: {
                    required: "Email Kosong Harap di isi",
                    email: "Masukan Email dengan benar"
                },
                password: {
                    required: "Password Kosong Harap di isi",
                    minlength: "Password kurang dari 5 karakter"
                },
                nama: {
                    required: "Nama Kosong Harap di isi",
                    minlength: "Nama kurang dari 5 karakter"
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
