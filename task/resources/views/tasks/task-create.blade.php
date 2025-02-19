<x-app-layout>

    <main>
        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Task</h1>
                <form action="{{ route('tasks.store') }}" method="POST" class=" mx-auto" id="addTask">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Task Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Name" required>
                            </div>

                            <div class="mb-4">
                                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">
                                    Projects:
                                </label>
                                <select name="project_id" id="project_id"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="" disabled selected>Select project</option>

                                    @if ($projects)
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}"> {{ $project->name }}</option>
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
                                    <option value="" disabled selected>Select category</option>

                                    @if ($categories)
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
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
                                    placeholder="Start time" required>
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
                                    placeholder="Describe your task here..." name="description" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">
                                    Status:
                                </label>
                                <select name="status" id="status"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option value="" disabled selected>Select status</option>

                                @if ($statuses)
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->value }}">{{ ucfirst(str_replace('_', ' ', $status->value)) }}</option>
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
    <script>
        $(document).ready(function(){
            $('#addTask').on('submit', function(e){
                e.preventDefault();

                let formData = new FormData(this);
                $.ajax({
                    url: '{{ route('tasks.store') }}',
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (res) {
                        console.log(res);
                        window.location.href = "{{ route('tasks.all') }}";
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText); // Log the server response
                    }
                });
            });
        });
    </script>
</x-app-layout>