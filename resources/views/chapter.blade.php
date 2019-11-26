@extends('layouts.app')

@section('content')
<body style="background: url(http://2.bp.blogspot.com/-wvhN9xks8Do/VGzuFlUmcRI/AAAAAAAABoU/tFmjBHSvdbY/s1600/dotth.biz14.jpg);background-repeat: repeat;background-attachment: fixed;background-position: center;"  >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-7">
        <div class="card">
            @guest
                <a style="float: right;" href="cartoon0" class="btn btn-danger">กลับ</a>
            @else
            @if(Auth::user()->status != 'user' && $cartoon->id == Auth::user()->id)
            <a style="float: right;" href="cartoon{{ Auth::user()->id }}" class="btn btn-danger">กลับ</a>
                <div class="card-header">{{ __('เพิ่มตอนการ์ตูน') }} </div>
                <div class="card-body">
                        @if (session('status')==1)
                                <div class="alert alert-success" role="alert">
                                  <h3 align="center">บันทึกสำเร็จ</h3> 
                                </div>   
                            @elseif(session('status')==2)
                                <div class="alert alert-danger" role="alert">
                                    <h3 align="center">เกิดข้อผิดพลาด</h3> 
                                </div>
                            @elseif(session('status')==3)
                                <div class="alert alert-success" role="alert">
                                    <h3 align="center">ลบสำเร็จ</h3> 
                                </div> 
                            @endif
                    <form method="POST" action="addchap_save">
                        @csrf
                        <input type="hidden" name="cartoon_id" value="{{ $cartoon->cartoon_id }}">
                        <div class="form-group row">
                            <label for="chapter_name" class="col-sm-4 col-form-label text-md-right">{{ __('ตอนที่') }}</label>
                            <div class="col-md-2">
                                <input id="chapter_name" type="number" class="form-control" name="chapter_name" value="{{ old('chapter_name') }}" required autofocus>
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
                                <textarea id="link" type="text" class="form-control" name="link" value="{{ old('link') }}" required autofocus></textarea>
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
                                        {{ __('เพิ่ม') }}
                                    </button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            
            @else
                <a style="float: right;" href="cartoon0" class="btn btn-danger">กลับ</a>
            @endif
                            
        @endguest
          
        <br>
        <!-- <div class="card-header text-dark bg-light"> -->
                <h3 align="center">{{ $cartoon->cartoon_name }}</h3>
                <center><img src='{{ $cartoon->cartoon_img }}' height="300"/><br><br>
                <!-- </div> -->
                    <p style="width:70%" class="form-control text-left">{{ $cartoon->detail }}</p><br></center>
                @foreach ($link as $link)  
                    @guest
                    <center><a href="playcartoon{{$link->link_id}}"><h5>{{ $cartoon->cartoon_name }} ตอนที่ {{$link->chapter}}</h5></a></center>
                    @else
                        @if(Auth::user()->status != 'user' && $cartoon->id == Auth::user()->id)
                        <div class="row justify-content-center">
                            <a size="10" href="playcartoon{{$link->link_id}}"><h5>{{ $cartoon->cartoon_name }} ตอนที่ {{$link->chapter}}</h5></a>
                            <span style="color: rgb(255, 0, 0);">| | |</span>
                            <a href="editchap{{$link->link_id}}"><h5>แก้ไข</h5></a>
                            <span style="color: rgb(255, 0, 0);">| | |</span>
                            <a href="deletechap/{{$link->link_id}}/{{$link->cartoon_id}}" onclick="return confirm('คุณต้องการลบตอนที่ {{$link->chapter}} นี้ใช่หรือไม่')"><h5>ลบ</h5></a>
                        </div>
                        @else 
                        <center><a href="playcartoon{{$link->link_id}}"><h5>{{ $cartoon->cartoon_name }} ตอนที่ {{$link->chapter}}</h5></a></center>
                        @endif
                    
                    @endguest             
                @endforeach
                <br>
            </div>
        </div>
        
    </div>
    
</div>
@endsection