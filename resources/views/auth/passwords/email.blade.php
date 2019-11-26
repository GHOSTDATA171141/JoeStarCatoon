@extends('layouts.app')

@section('content')
<body style="background: url(http://2.bp.blogspot.com/-wvhN9xks8Do/VGzuFlUmcRI/AAAAAAAABoU/tFmjBHSvdbY/s1600/dotth.biz14.jpg);background-repeat: repeat;background-attachment: fixed;background-position: center;"  >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div  align="center" class="card-header">{{ __('การเปลี่ยนรหัสผ่าน') }}</div>

                <div class="card-body">
                    @if (session('status')==1)
                        <div class="alert alert-success" role="alert">
                            Success
                        </div>   
                    @elseif(session('status')==2)
                        <div class="alert alert-danger" role="alert">
                            Incorrect information
                        </div> 
                    @endif
                    <form method="POST" action="resetpass">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่านใหม่') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-right">{{ __('ยืนยันรหัสผ่านใหม่') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="secret_pass" class="col-md-4 col-form-label text-md-right">{{ __('ตัวป้องกันการเปลี่ยนรหัสผ่าน') }}</label>

                            <div class="col-md-6">
                                <input id="secret_pass" type="text" class="form-control{{ $errors->has('secret_pass') ? ' is-invalid' : '' }}" name="secret_pass" value="{{ $email ?? old('secret_pass') }}" required autofocus>

                                @if ($errors->has('secret_pass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('secret_pass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div align="center" class="col-md-6 offset-md-4">
                                <button  type="submit" class="btn btn-primary">
                                    {{ __('ยืนยันการเปลี่ยนรหัสผ่าน') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
