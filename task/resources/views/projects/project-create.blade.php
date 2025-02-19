<x-app-layout>

    <main>
        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Project</h1>
                <form action="{{ route('projects.store') }}" method="POST" class=" mx-auto" id="addProject">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Project Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Name" required>
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
                                    placeholder="Describe your project here..." name="description" required></textarea>
                            </div>
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>
    <script>
        $(document).ready(function(){
            $('#addProject').on('submit', function(e){
                e.preventDefault();

                let formatData = new FormData(this);
                $.ajax({
                    url: '{{ route('projects.store') }}',
                    type: "POST",
                    data: formatData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);

                        window.location.href = "{{ route('projects.all') }}";
                    }
                });
            });
        });
    </script>
</x-app-layout>