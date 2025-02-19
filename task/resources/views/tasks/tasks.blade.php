<x-app-layout>

    <main class="p-6 ">
        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-between align-center">
                    <h1 class="p-4 text-xl text-orange-500 font-medium ">Tasks</h1>
                    <a href="{{ route('tasks.form')}}"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Add
                        new Task</a>
                </div>

                <div class="body border border-gray-400 rounded-md mt-3">
                    <table class="w-full text-lg text-left rounded-md table-fixed">
                        <thead class="text-md text-white capitalize bg-orange-500 font-medium rounded-md">
                            <tr>
                                <th class="px-6 py-3">
                                   Id
                                </th>
                                <th class="px-6 py-3">
                                    Name
                                </th>
                                <th class="px-6 py-3">
                                    Project Name
                                </th>
                                <th class="px-6 py-3">
                                    Category Name
                                </th>
                                <th class="px-6 py-3">
                                    Description
                                </th>
                                <th class="px-6 py-3">
                                    Status
                                </th>
                                <th class="px-6 py-3">
                                   Due Date
                                </th>
                                <th class="px-6 py-3">
                                   Action
                                 </th>
                            </tr>
                        </thead>
                        <tbody class="text-md text-white capitalize bg-white-500 font-medium rounded-md">
                            @if ($tasks)
                                @foreach ($tasks as $task)
                                <tr class="border-b-2">
                                    <td class="px-6 py-2">
                                        {{ $task->id }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $task->name }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $task->project->name }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $task->category->name }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ substr($task->description, 0, 45) }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $task->status }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $task->due_date }}
                                    </td>
                                    <td class="px-6 py-2">
                                        <a href="#" data-id="{{ $task->id }}" class="text-blue-600 mx-2"
                                            id='edit'>
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
    </main>
    <script>
         $(document).on('click', '#edit', function(e) {
            e.preventDefault();

            const taskId = $(this).data('id');
            const editUrl = "{{ route('tasks.edit', ':id') }}".replace(':id', taskId);
            window.location.href = editUrl;
        });
    </script>
</x-app-layout>