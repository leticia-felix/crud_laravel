@extends('master')

@section('content')


<h1>Users</h1>
<ul>
    @foreach ($users as $user)

    <li>{{$user->name}}</li>
    
    @endsection
</ul>

