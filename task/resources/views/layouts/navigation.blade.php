<nav  class="bg-white  border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
  
        <div class="flex justify-center items-center h-16">
            
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    
                    <nav class="font-medium ">
                        <ul class="flex justify-between space-x-8">
                            <li><a href="{{route('projects.all')}}"
                                    class="hover:border-b-2 hover:border-gray-500">Projects</a>
                            </li>
                            <li><a href="{{route('categories.all')}}" class="hover:border-b-2 hover:border-gray-500">Categories</a></li>
                            <li><a href="{{route('tasks.all')}}" class="hover:border-b-2 hover:border-gray-500">Tasks</a></li>
                        </ul>
                    </nav>
                    <a href="#">
                        <i class="fa-regular fa-bell mx-10 font-medium"></i>
                    </a>
                </div>
    </div>    
</nav>
