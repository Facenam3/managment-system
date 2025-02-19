<x-app-layout>

    <main>
        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="p-4 text-xl text-orange-500 font-medium ">Create Category</h1>
                <form action="{{ route('categories.store')}}" method="POST" class=" mx-auto" id="addCategory">
                    @csrf
                    <div class="flex">
                        <div class="w-full md:w-1/2 px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Category Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Name" required>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 p-6">
                            <input type="submit" value="Submit"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-yellow-900">

                        </div>

                    </div>
            </div>
            </form>
        </div>
    </main>
    <script>
        $(document).ready(function(){
            $('#addCategory').on('submit', function(e){
                e.preventDefault();

                let formatData = new FormData(this);
                $.ajax({
                    url: '{{ route('categories.store') }}',
                    type: "POST",
                    data: formatData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        console.log(res);

                        window.location.href = "{{ route('categories.all') }}";
                    }
                });
            });
        });
    </script>
</x-app-layout>