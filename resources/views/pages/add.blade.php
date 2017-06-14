@extends('layouts.default')
@section('content')
    @isset ($task_id)
        <div class="row">
            <div class="alert alert-success" role="alert">Task added {{ $task_id }}</div>
        </div>
    @endisset
    <h1>Adding New Task</h1>
    <div class="row">
        @include('shared.task_form');
    </div>
    <div class="row">
        @include('shared.gotolist');
    </div>
@stop