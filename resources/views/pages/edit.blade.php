@extends('layouts.default')
@section('content')
    <h1>Editing Task ID {{$task->id}}</h1>
    <div>
        @include('shared.task_form');
    </div>
    @include('shared.gotolist');
@stop