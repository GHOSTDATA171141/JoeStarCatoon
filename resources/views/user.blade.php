@extends('layouts.app')
@if($status=='admin')
    @section('content')
    <body style="background: url(http://2.bp.blogspot.com/-wvhN9xks8Do/VGzuFlUmcRI/AAAAAAAABoU/tFmjBHSvdbY/s1600/dotth.biz14.jpg);background-repeat: repeat;background-attachment: fixed;background-position: center;"  >
    <div class="row justify-content-center">
            <div class="col-sm-7">
                @guest
                @else
                <div class="card">
                    <div class="card-header">{{ __('เพิ่มตอนการ์ตูน') }} <a style="float: right;" href="{{url('cartoon'.$admin_id)}}" class="btn btn-danger">กลับ</a></div>
                    <div class="card-body">
                            @if (session('status')==1)
                                    <div class="alert alert-success" role="alert">
                                      <h3 align="center">บันทึกสำเร็จ</h3> 
                                    </div>   
                                @elseif(session('status')==2)
                                    <div class="alert alert-danger" role="alert">
                                        <h3 align="center">ไม่มีการแก้ไข</h3> 
                                    </div>
                                @elseif(session('status')==3)
                                    <div class="alert alert-success" role="alert">
                                        <h3 align="center">ลบสำเร็จ</h3> 
                                    </div> 
                                @endif
                            <div class="form-group row">
                                <div class="col-sm-3"><h4 align="center">Username</h4></div>
                                <div class="col-sm-4"><h4 align="center">E-mail</h4></div>
                                <div class="col-sm-2"><h4 align="center">สถานะ</h4></div>
                                <div class="col-sm-3"><h4 align="center"></h4></div>
                            </div>
                        @foreach ($user as $user)
                        <form method="POST" action="{{url('status_save')}}">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$user->id}}">
                            <input type="hidden" name="admin_id" id="admin_id" value="{{$admin_id}}">
                            <div class="form-group row">
                                    <div class="col-md-3"><h4 align="center">{{$user->name}}</h4></div>
                                    <div class="col-md-4"><h4 align="center">{{$user->email}}</h4></div>
                                    <div class="col-md-2">
                                        <center>
                                            <select name="status" id="status" class="form-control" style="width:100%">
                                                @if($user->status=='admin')
                                                    <option value="{{$user->status}}">{{$user->status}}</option>
                                                    <option value="blogger">blogger</option>
                                                    <option value="user">user</option></option>
                                                @elseif($user->status=='blogger')
                                                    <option value="{{$user->status}}">{{$user->status}}</option>
                                                    <option value="admin">admin</option>
                                                    <option value="user">user</option></option>
                                                @elseif($user->status=='user')
                                                    <option value="{{$user->status}}">{{$user->status}}</option>
                                                    <option value="blogger">blogger</option>
                                                    <option value="admin">admin</option></option>
                                                @endif
                                            </select>
                                        </center>
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">บันทึก</button>&ensp;&ensp;&ensp;&ensp;
                                        <a href="{{url('delete_user'.$user->id)}}" onclick="return confirm('คุณต้องการลบผู้ใช้ {{$user->name}} ใช่หรือไม่')" class="btn btn-danger">ลบ</a>
                                    </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>                      
            @endguest
        </div>
    </div>
    @endsection
@else
@endguest