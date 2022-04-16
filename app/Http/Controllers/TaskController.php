<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use DB;
use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
      
        return view('home')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        try {
        Task::create([
            'task' => $request->task
        ]);
        return redirect()->back()->with(['success' => 'you have a new task!!']);
    } catch (\Exception $ex) {

        DB::rollback();
        return redirect()->route('home')->with(['error' => 'حwrong with error']);
    }
        

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
        $tasks = Task::find($id);
        return view('edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        try {
            

            $tasks =Task::find($id);




            $tasks->update($request->all());
            //save translations
           
            

          

            $tasks->save();

           
            return redirect()->route('home')->with(['success' => 'updated your task']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('home')->with(['error' => 'حwrong with error']);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect()->route('home', ['id' => $task->id]);
    }
    public function delete($id)
    {
        $tasks= Task::findOrFail($id);
        $tasks->delete();
        return redirect()->back()->with(['success' => 'you deleted a task!!']);
    }
}
