<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]); // tasks/index. it is returning an array having all the tasks that are stored inside the table tasks
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.index'); // here the form submission and creation of data is done
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** method number one (basic) for inserting data */
        /* $tasks = new Task;
        $tasks->taskName = $request->input('taskName');
        $tasks->save();  */
        /** method number two for inserting data by passing an array
         * here the array items will be passed through model which will decide whether to give insertion access or not
         */
        $tasks = Task::create([
            'taskName' => $request->input('taskName'),
        ]);
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Task::find($id)->first();
        return view('tasks')->with('id', $tasks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $ids[] = $request->taskId;
        $taskNames[] = $request->taskName;
        $i = 0;
    
        foreach($ids as $id)
        {
            $tasks = Task::where('taskId',$id)
                    ->update([
                        'taskName'=>$taskNames[$i]
            ]);
            $i++;
        }   
        
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
