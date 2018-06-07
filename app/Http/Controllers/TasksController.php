<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (null !== \Auth::user()){
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);}
        else{
        return view('welcome');    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    if (null !== \Auth::user()){
          $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);}
        else{
        return view('welcome');    
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
              'status' => 'required|max:10', 
            'content' => 'required|max:191',
        ]);
        
        $request->user()->tasklists()->create([
            'content' => $request->content,
            'status' => $request->status,
            ]);
        //   $task = new Task;
        //   $task->status = $request->status;
        // $task->content = $request->content;
        // $task->save();
       $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Display  the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $task = Task::find($id);
        print_r($task);
        print_r(\Auth::user());
            if (isset($task)){
                if (null !== \Auth::user() && \Auth::user()->id == $task->user_id){
                    return view('tasks.show', [ 'task' => $task,]);
                    
                }else{
                    return view('welcome');
                }
            }else{
              return view('welcome');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $this->validate($request, [
        'status' => 'required|max:10', 
            'content' => 'required|max:191',
        ]);
        
        $task = Task::find($id);
         $task->status = $request->status;
        $task->content = $request->content;
        $task->save();

       $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  $task = Task::find($id);
        $task->delete();

 $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    

}
