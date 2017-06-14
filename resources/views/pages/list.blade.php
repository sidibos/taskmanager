@extends('layouts.default')
@section('content')
    <h1>Tasks list</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Task Id</th>
                <th>Category</th>
                <th>Detail</th>
                <th>Urgency</th>
                <th>Type</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Website</th>
                <th>Stack</th>
                <th>Actions</th>
            </tr>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->category->name }}</td>
                <td>{{ $task->category->details }}</td>
                <td>{{ $task->category->urgency }}</td>
                <td>{{ $task->category->type }}</td>
                <td>{{ Carbon\Carbon::parse($task->category->due_date)->format('d-m-Y') }}</td>
                <td>{{ $task->category->status }}</td>
                <td>{{ $task->category->website }}</td>
                <td>{{ $task->category->stack }}</td>
                <td>
                    <div class="row">
                        <div class="col-xs-4">
                            <a href="/task/edit/{{ $task->id }}" class="btn btn-default">Edit</a>
                        </div>
                        <div class="col-xs-4">
                            <form action="/task/destroy/" method="POST">
                                <input type="hidden" name="task_id" value="{{$task->id}}" />
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <a href="/task/create/" class="btn btn-primary">Add New Task</a>
        </div>
    </div>
@stop