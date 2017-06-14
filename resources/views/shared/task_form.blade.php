<form action="@if ($task->id) /task/update/ @else /task/store/ @endif" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="category" class="col-sm-2 control-label">Category</label>
        <div class="col-sm-6">
            <select name="category" id="category" class="form-control">
                <option value="Development" @if ($task->category->name == "Development") selected @endif>Development</option>
                <option value="Marketing" @if ($task->category->name == "Marketing") selected @endif>Marketing</option>
                <option value="Content" @if ($task->category->name == "Content") selected @endif>Content</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="urgency" class="col-sm-2 control-label">Urgency</label>
        <div class="col-sm-6">
            <select name="urgency" id="urgency" class="form-control">
                <option value="Low" @if ($task->category->urgency == "Low") selected @endif>Low</option>
                <option value="Medium" @if ($task->category->urgency == "Medium") selected @endif>Medium</option>
                <option value="High" @if ($task->category->urgency == "High") selected @endif>High</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="type" class="col-sm-2 control-label">Type</label>
        <div class="col-sm-6">
            <select name="type" id="type" class="form-control">
                <option value="Online" @if ($task->category->type == "Online") selected @endif>Online</option>
                <option value="Offline" @if ($task->category->type == "Offline") selected @endif>Offline</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="due_date" class="col-sm-2 control-label">Due Date</label>
        <div class="col-sm-6">
            <input type="text" name="due_date" id="due_date" value="{{$task->category->due_date}}" class="form-control" placeholder="d/m/Y">
        </div>
    </div>
    <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-6">
            <select name="status" id="status" class="form-control">
                <option value="Pending" @if ($task->category->status == "Pending") selected @endif>Pending</option>
                <option value="In Progress" @if ($task->category->status == "In Progress") selected @endif>In Progress</option>
                <option value="Complete" @if ($task->category->status == "Complete") selected @endif>Complete</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="website" class="col-sm-2 control-label">Website</label>
        <div class="col-sm-6">
            <input type="text" name="website" id="website" value="{{$task->category->website}}" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="stack" class="col-sm-2 control-label">Stack</label>
        <div class="col-sm-6">
            <select name="stack" id="stack" class="form-control">
                <option value=""></option>
                <option value="Backend" @if ($task->category->stack == "Backend") selected @endif>Backend</option>
                <option value="Frontend" @if ($task->category->stack == "Frontend") selected @endif>Frontend</option>
                <option value="Full" @if ($task->category->stack == "Full") selected @endif>Full</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="details" class="col-sm-2 control-label">Details</label>
        <div class="col-sm-6">
            <textarea name="details" rows="4" class="form-control">
                    {{$task->category->details}}
            </textarea>
        </div>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="task_id" id="task_id" value="{{$task->id}}" />
    @if($task->id)
        {{ method_field('PUT') }}
    @endif
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>