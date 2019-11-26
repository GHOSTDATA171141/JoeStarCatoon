@extends('layouts.app')

@section('content')
<body style="background: url(http://2.bp.blogspot.com/-wvhN9xks8Do/VGzuFlUmcRI/AAAAAAAABoU/tFmjBHSvdbY/s1600/dotth.biz14.jpg);background-repeat: repeat;background-attachment: fixed;background-position: center;"  >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{ __('เพิ่มการ์ตูน') }} <a style="float: right;" href="cartoon{{ $cartoon->id }}" class="btn btn-danger">กลับ</a></div>
                <div class="card-body">
                        @if (session('status')==1)
                            <div class="alert alert-success" role="alert">
                                <h3 align="center">บันทึกสำเร็จ</h3> 
                            </div>   
                        @elseif(session('status')==2)
                            <div class="alert alert-danger" role="alert">
                                <h3 align="center">ไม่มีการแก้ไข</h3> 
                            </div> 
                        @endif
                    <form method="POST" action="save_cartoon" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cartoon_id" value="{{ $cartoon->cartoon_id }}">
                        <input type="hidden" name="cartoon_img" value="{{ $cartoon->cartoon_img }}">
                        <div class="form-group row">
                            <label for="cartoon_name" class="col-sm-4 col-form-label text-md-right">{{ __('ชื่อการ์ตูน') }}</label>
                            <div class="col-md-6">
                                <input id="cartoon_name" type="text" class="form-control" name="cartoon_name" value="{{$cartoon->cartoon_name}}" required autofocus>
                                @if ($errors->has('cartoon_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cartoon_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail" class="col-sm-4 col-form-label text-md-right">{{ __('รายระเอียด') }}</label>
                            <div class="col-md-6">
                                <textarea id="detail" rows="4" type="text" class="form-control" name="detail" value="{{ old('detail') }}" required autofocus>{{$cartoon->detail}}</textarea>
                                @if ($errors->has('detail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cartoon_img" class="col-sm-4 col-form-label text-md-right">{{ __('หน้าปก') }}</label>
                            <input name="cartoon_img" type="file" class="col-sm-4 col-form-label text-md-right" id="cartoon_img">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <center>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('บันทึก') }}
                                    </button>
                                </center>
                            </div>
                        </div>
                    </form>
                    <br>
                    <center>
                        <img src='{{ $cartoon->cartoon_img }}' height="250" />
                    </center>
                </div>
            </div>                      
        </div>
    </div> 
    <br>
</div>
@endsection