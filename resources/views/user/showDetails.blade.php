@extends('layoutsdesign.designTwo')
@section('content')
<table border="2">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Joined At </th>
    </tr>
    @foreach($customers as $cs)
        <tr>
            <td>{{$cs->id}}</td>
            <td><a href="{{route('user.details',['id'=>$cs->id])}}">{{$cs->name}}</a></td>
            <td>{{$cs->email}}</td>
            <td>{{$cs->created_at}}</td>
        </tr>
    @endforeach
</table>
@endsection