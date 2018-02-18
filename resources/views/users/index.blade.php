@extends('layouts.app')


@section('content')

    <div class="container-fluid">
        <user-component :data="{{$users}}"></user-component>
    </div>

@stop