@extends('layoutsdesign.design')
@section('content')
<html><head><h1>Registration Form</h1></head></html>
    <form method="post" action="">
        {{@csrf_field()}}
        <table border="2">
        
        <tr>
        <td>
        Name:<input type="text" name="name" placeholder="Name" value="{{old('name')}}"></tr></td>
        @error('name')
            {{$message}}<br>
        @enderror
        
        <tr><td>Email: <input type="text" name="email" placeholder="Email" value="{{old('email')}}"><br></tr></td>
        @error('email')
            {{$message}} <br>
        @enderror
        <tr><td>
        Password: <input type="password" name="password" ><br></tr></td>
        @error('password')
            {{$message}}<br>
        @enderror
        <tr><td>
        Confirm Password: <input type="password" name="conf_password"><br></tr></td>
        @error('conf_password')
            {{$message}}<br>
        @enderror
<tr><td>
        Type: <input type="text" name="type" placeholder ="Type" value="{{old('type')}}"><br></td></tr>
    </table><br>
       <input type="submit" value="Create"> 

    </form>
@endsection