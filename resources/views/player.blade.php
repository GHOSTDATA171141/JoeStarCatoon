@extends('layouts.app')

@section('content')
<body style="background: url(http://2.bp.blogspot.com/-wvhN9xks8Do/VGzuFlUmcRI/AAAAAAAABoU/tFmjBHSvdbY/s1600/dotth.biz14.jpg);background-repeat: repeat;background-attachment: fixed;background-position: center;"  >
<div class="container">
    <center>
        @foreach ($link as $link)
            <h2>{{$link->cartoon_name}} ตอนที่ {{$link->chapter}}</h2><br>
            <iframe src="{{$link->link}}" frameborder="1" height="570" width="1000"></iframe><br>
            {{-- <video controls="" autoplay="" name="media"><source src="{{$link->link}}" type="video/mp4"></video><br>      --}}
            <a href="playcartoon{{$link->link_id}}" class="btn btn-danger">กดหากวิดีโอไม่แสดง</a><br><br>
            <a href="chapter{{$link->cartoon_id}}" class="btn btn-danger">ย้อนกลับ</a>
        @endforeach
    </center>
</div>
@endsection