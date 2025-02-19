<x-app-layout>

    <main class="p-6 ">
        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex justify-between align-center">
                    <h1 class="p-4 text-xl text-orange-500 font-medium ">Projects</h1>
                    <a href="{{route('projects.create')}}"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">Add
                        new Project</a>
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
                                    Description
                                </th>

                                <th class="px-6 py-3">
                                   Due Date
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-md text-white capitalize bg-white-500 font-medium rounded-md">
                            @if ($projects)
                                @foreach ($projects as $project)
                                    <tr class="border-b-2">
                                        <td class="px-6 py-3">
                                            {{ $project->id }}
                                        </td>
                                        <td class="px-6 py-3">
                                            {{ $project->name }}
                                        </td>
                                        <td class="px-6 py-2">
                                            {{ substr($project->description, 0 , 35)  }}
                                        </td>
                                        <td class="px-6 py-2">
                                            {{ $project->due_date }}
                                        </td>
                                        
                                    </tr>
                                @endforeach
                        
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
    </main>
</x-app-layout>