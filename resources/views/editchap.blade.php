@extends('layouts.app')

@section('content')
<body style="background: url(http://2.bp.blogspot.com/-wvhN9xks8Do/VGzuFlUmcRI/AAAAAAAABoU/tFmjBHSvdbY/s1600/dotth.biz14.jpg);background-repeat: repeat;background-attachment: fixed;background-position: center;"  >
<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="card">
                    @foreach ($link as $link)
                    <div class="card-header">{{ __('แก้ไขตอนการ์ตูน') }} <a style="float: right;" href="chapter{{$link->cartoon_id}}" class="btn btn-danger">กลับ</a></div>
                    <div class="card-body">
                            @if (session('status')==1)
                                <div class="alert alert-success" role="alert">
                                  <h3 align="center">บันทึกสำเร็จ</h3> 
                                </div>   
                            @elseif(session('status')==2)
                                <div class="alert alert-danger" role="alert">
                                    <h3 align="center">เกิดข้อผิดพลาด</h3> 
                                </div> 
                            @endif
                        <form method="POST" action="editchap_save">
                            @csrf
                                <input type="hidden" name="link_id" value="{{ $link->link_id }}">
                                <h4 align="center">{{ $link->cartoon_name }}</h4>
                                <div class="form-group row">
                                    
                                    <label for="chapter_name" class="col-sm-4 col-form-label text-md-right">{{ __('ตอนที่') }}</label>
                                    <div class="col-md-2">
                                        <input id="chapter_name" type="number" class="form-control" name="chapter_name" value="{{ $link->chapter }}" required autofocus>
                                        @if ($errors->has('chapter_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('chapter_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="link" class="col-sm-4 col-form-label text-md-right">{{ __('ลิ้งค์') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required autofocus>{{ $link->link }}</textarea>
                                        @if ($errors->has('link'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div  class="col-md-12">
                                        <center>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('บันทึก') }}
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            @endforeach
                            
                        </form>
                    </div>
                </div>                      
            </div>
        </div>
    </div>
@endsection