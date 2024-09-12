<x-app-layout>
    <x-active>

        <div class="sm:px-6 w-full flex-row">
           
                <x-page-title>
                    <p tabindex="0"
                        class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                        Projects</p>
                </x-page-title>
        </div>

        <x-back-div>
            <a class="text-sm font-medium my-2 px-2 py-2 rounded-sm bg-blue-500 hover:bg-blue-700 text-white"
                      href="{{ route('projects.create') }}">
                      Create project</a>
                      <a class="text-sm font-medium my-2 px-2 py-2 rounded-sm bg-gray-500 hover:bg-gray-700 text-white"
                      href="{{ route('projects-deleted') }}">
                     Deleted projects</a>
                      

          </x-back-div>

          @include('layouts.messages')
        <x-active-page-content>
            <table class="w-full whitespace-nowrap">
                <tbody>

                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <th>
                        </th>
                        <th> Title</th>
                        <th> Assigned User</th>
                        <th> Client </th>

                        <th> Status</th>
                        <th> Due Date</th>
                        <th> Created @</th>
                    </tr>
                    @foreach ($projects as $project)
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td>
                            <div class="ml-5">
                                <div
                                    class="bg-gray-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">

                                    E
                                </div>
                            </div>
                        </td>
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $project->title
                                    }}</p>

                            </div>
                        </td>

                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ $project->user->name
                                    }}</p>

                            </div>
                        </td>
                        <td class="pl-24">
                            <div class="flex items-center">

                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $project->client->company_name}}
                                </p>
                            </div>
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">

                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $project->status
                                    }}</p>
                            </div>
                        </td>

                        <td class="pl-5">
                            <div class="flex items-center">

                                <p class="text-sm leading-none text-gray-600 ml-2">{{ $project->duedate
                                    }}</p>
                            </div>
                        </td>

                        <td class="pl-5">
                            <div class="flex items-center">

                                <p class="text-sm leading-none text-gray-600 mr-2">{{ $project->created_at
                                    }}</p>
                            </div>
                        </td>

                        <td class="flex flex-row">
                            <a class="0 inline-flex  text-white rounded
                            items-start justify-start 
                            px-3 py-1 mr-1 bg-green-500" href="{{ route('projects.show',$project->id) }}"> View</a>

                            @can('manage projects')


                            <a class="0 inline-flex  text-white
                            items-start justify-start 
                            px-3 py-1 mr-1 bg-yellow-500 focus:outline-none rounded"
                                href="{{ route('projects.edit',$project->id) }}"> Edit</a>

                                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                       
                            <button class="0 inline-flex  text-white
                            items-start justify-start 
                            px-3 py-1 bg-red-500 h focus:outline-none rounded" href="">
                                Delete</button>
                            </form>
                            @endcan
                        </td>

                    </tr>
                    @endforeach
               

                </tbody>
            </table>
            <div class="p-3 mt-2 bg-gray-200">
            {{ $projects->links() }}
            </div>
        </x-active-page-content>
    </x-active>
</x-app-layout>