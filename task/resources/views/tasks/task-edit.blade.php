<x-app-layout>

    <main>
        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Update Task</h1>
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class=" mx-auto" id="addTask">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Task Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Name" value="{{ old('name', $task->name)}}" required>
                            </div>

                            <div class="mb-4">
                                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Projects:
                                </label>
                                <select name="project_id" id="project_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @if ($projects)
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                                                {{ $project->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Categories:
                                </label>
                                <select name="category_id" id="category_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @if ($categories)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="due_date" class="block text-gray-700 text-sm font-bold mb-2">
                                    Due Date:
                                </label>
                                <input type="date" id="due_date" name="due_date"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    value="{{ old('due_date', $task->due_date) }}" required>
                            </div>

                            <input type="submit" value="Submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">
                        </div>

                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-3">
                                <label for="description"
                                    class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                                <textarea id="description" rows="5"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Describe your task here..."  name="description" required>{{old('description' , $task->description)}}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">
                                    Status:
                                </label>
                                <select name="status" id="status"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @if ($statuses)
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->value }}" {{ old('status', $task->status) == $status->value ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $status->value)) }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                           
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>
</x-app-layout>