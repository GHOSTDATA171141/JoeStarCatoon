@extends('layouts.app')

@section('content')
<body style="background: url(http://2.bp.blogspot.com/-wvhN9xks8Do/VGzuFlUmcRI/AAAAAAAABoU/tFmjBHSvdbY/s1600/dotth.biz14.jpg);background-repeat: repeat;background-attachment: fixed;background-position: center;"  >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
            @else
                @if($id!=0 && Auth::user()->status != 'user')
                    <div class="card">
                        <div class="card-header">{{ __('เพิ่มการ์ตูน') }}</div>
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
                            <form method="POST" action="store" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <div class="form-group row">
                                    <label for="cartoon_name" class="col-sm-4 col-form-label text-md-right">{{ __('ชื่อการ์ตูน') }}</label>
                                    <div class="col-md-6">
                                        <input id="cartoon_name" type="text" class="form-control" name="cartoon_name" value="{{ old('cartoon_name') }}" required autofocus>
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
                                        <textarea id="detail" rows="4" type="text" class="form-control" name="detail" value="{{ old('detail') }}" required autofocus></textarea>
                                        @if ($errors->has('detail'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('detail') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cartoon_img" class="col-sm-4 col-form-label text-md-right">{{ __('หน้าปก') }}</label>
                                    <input name="cartoon_img" type="file" class="col-sm-4 col-form-label text-md-right" id="cartoon_img" required autofocus>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <center>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('เพิ่ม') }}
                                            </button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endguest                      
        </div>
    </div> 
    <br>
    <center>
     <div   class="card-header text-white bg-light"> 
        <div class="row">
            <?php $i = 0; ?>
            @foreach ($cartoon as $cartoon)
           
                <?php $i++ ?>
                    @guest
                        <div class="col-xs-6 col-sm-4 col-md-3"> 
                            <img src='{{ $cartoon->cartoon_img }}' height="250"  width="190" /><br>
                         <font size="3" color="black"> <a font size="3" href="chapter{{$cartoon->cartoon_id}}">{{ $cartoon->cartoon_name }}</a></font> <br><br>
                        </div>
                    @else
                        @if($id!=0 && Auth::user()->status != 'user')
                            <div class="col-xs-6 col-sm-4 col-md-3"> 
                                <a href="edit_toon{{ $cartoon->cartoon_id }}" class="btn btn-danger">แก้ไข</a>
                                <a href="delete_toon/{{ $cartoon->cartoon_id }}/{{ $cartoon->cartoon_img }}" onclick="return confirm('คุณต้องการลบการ์ตูนเรื่องนี้ใช่หรือไม่')" class="btn btn-danger">ลบ</a><br><br>
                                <img src='{{ $cartoon->cartoon_img }}' height="250" width="190"/><br>
                                <font size="3" color="black"><a  href="chapter{{$cartoon->cartoon_id}}">{{ $cartoon->cartoon_name }}</a></font><br><br>
                            </div>
                        @else
                            <div class="col-xs-6 col-sm-4 col-md-3"> 
                                <img src='{{ $cartoon->cartoon_img }}' height="250" width="190"/><br>
                                <font size="3" color="black"> <a  href="chapter{{$cartoon->cartoon_id}}">{{ $cartoon->cartoon_name }}</a></font><br><br>
                            </div>
                        @endif
                    @endguest 
                @if ($i/4==0)
                    </div>
                    <br>
                @endif
               
            @endforeach 
        </div>
    </div>
        <br>
    </center>
</div>
@endsection