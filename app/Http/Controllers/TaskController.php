<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Task;
use App\Models\Category;
use Carbon\Carbon;


class TaskController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(Request $request)
    {
        return view('pages.home');
    }

    /**
     * Store a new task
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $categoryObj = $this->buildCategory($request);

        $task_id = 0;
        if($categoryObj->save()){
            $taskObj = new Task;
            $taskObj->category_id = $categoryObj->id;
            $taskObj->save();

            $task_id = $taskObj->id;
        }

        return redirect('task/');
    }

    /**
     * returns an empty category object
     * @return Task
     */
    protected function getEmptyTask()
    {
        $task = new Task;
        $task->category = new category;
        return $task;
    }

    /**
     * build category object based on request data
     * this could be for an empty category or for an existing one
     * @param Request $request
     * @param int $category_id
     * @return Category
     */
    protected function buildCategory(Request $request, $category_id = 0)
    {
        $category = ($category_id) ? Category::find($category_id) : new Category;

        $category->name     = $request->input('category');
        $category->details  = $request->input('details');
        $category->urgency = $request->input('urgency');
        $category->type    = $request->input('type');
        $category->due_date = Carbon::parse($request->input('due_date'))->format("Y-m-d");
        $category->status   = $request->input('status');
        $category->website  = $request->input('website');
        $category->stack    = $request->input('stack');

        return $category;
    }

    /**
     * display a form to add a new task
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request)
    {
        return view('pages.add', ['task'=> $this->getEmptyTask()]);
    }

    /**
     * Update the given task.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $task_id = $request->input('task_id');
        $task = Task::find($task_id);
        $category = $this->buildCategory($request, $task->category_id);
        $category->save();

        return redirect('task/');
    }

    /**
     * Show the given task.
     *
     * @param  int  $id
     * @return Response
     */
    public function all(Request $request)
    {
        $tasks = $this->getAllTasks();

        return view('pages.list', ['tasks' => $tasks]);
    }

    /**
     * return all tasks
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getAllTasks()
    {
        $tasks = Task::all();
        foreach($tasks as &$task)
        {
            $task->category = $task->category()->first();
        }
        return $tasks;
    }

    /**
     * Show the given task.
     *
     * @param  int  $task_id
     * @return Response
     */
    public function show($task_id)
    {
        if($task_id){
            $task = Task::find($task_id);
            $task->category = $task->category()->first();
            $task->category->due_date = Carbon::parse($task->category->due_date)->format("d/m/Y");
        }
        return View('pages.edit', ['task'=>$task]);
    }

    /**
     * delete the given task
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $task_id = (int)$request->input('task_id');
        if($task_id) {
            $taskObj = Task::find($task_id);
            if($taskObj->category()->delete()) {
                $taskObj->delete();
            }
        }

        return redirect('task/');
    }
}