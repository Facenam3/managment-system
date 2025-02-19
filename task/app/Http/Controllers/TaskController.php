<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Project;
use App\Enums\TaskStatus;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.tasks', ['tasks' => $tasks]);
    }

    public function create() {
        $allProjects = Project::all();
        $allCategories = Category::all();
        $statuses = TaskStatus::cases();

        return view('tasks.task-create', [
            'projects' => $allProjects,
            'categories' => $allCategories,
            'statuses' => $statuses
        ]);
    }

    public function edit($id) {
        $task = Task::findOrFail($id);
        $allProjects = Project::all();
        $allCategories = Category::all();
        $statuses = TaskStatus::cases();

        $task->due_date = $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : null;

        return view('tasks.task-edit', [
            'task' => $task,
            'projects' => $allProjects,
            'categories' => $allCategories,
            'statuses' => $statuses
            
        ]);
    }

    public function allTasks() {
        $allTasks = Task::all();

        return response()->json([
            'message' => 'Returnin all Tasks',
            'task' => $allTasks
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:open,in_progress,completed'],
            'due_date' => ['required', 'date'],
            'project_id' => ['required', 'exists:projects,id'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'project_id' => $request->project_id,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'message' => 'Task created successfully',
            'task' => $task
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function filterByStatus(Request $request)
    {
        $request->validate([
            'status' => ['required', 'in:todo,in_progress,done'],
        ]);

        $status = $request->input('status');

        $tasks = Task::where('status', $status)->get();

        return response()->json([
            'message' => 'Status Tasks retrieved successfully',
            'tasks' => $tasks
        ],201);
    }

    public function filterByCategory(Request $request)
    {
        $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $categoryId = $request->input('category_id');

        $tasks = Task::where('category_id', $categoryId)->get();

        return response()->json([
            'message' => 'Tasks filtered successfully',
            'tasks' => $tasks
        ], 200);
    }

    public function listTasks(Request $request) {
        $request->validate([
            'status' => ['required', 'in:todo,in_progress,done'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $status = $request->input('status');
        $categoryId = $request->input('category_id');


        $tasks = Task::where('status', $status)
                 ->where('category_id', $categoryId)
                 ->get();

        return response()->json([
            'message' => 'Tasks retrieved successfully',
            'tasks' => $tasks
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function markTaskCompleted(Request $request, $id) {
        $task = Task::findOrFail($id);

        if ($task->status === 'done') {
            return response()->json([
                'message' => 'Task is already marked as completed'
            ], 400);
        }

        $task->update(['status' => 'done']);

        return response()->json([
            'message' => 'Task marked as completed successfully',
            'task' => $task
        ], 200);
    }
    public function update(Request $request, string $id)
    {
       $task = Task::findOrFail($id);

       $validate = $request->validate([
        'name' => 'sometimes|string|max:255',
        'project_id' => 'sometimes|exists:projects,id',
        'category_id' => 'sometimes|exists:categories,id',
        'due_date' => 'sometimes|date',
        'description' => 'sometimes|string',
        'status' => 'sometimes|string'
       ]);

       $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'project_id' => $request->project_id,
            'category_id' => $request->category_id,
       ]);

       return redirect()->route('tasks.all');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
