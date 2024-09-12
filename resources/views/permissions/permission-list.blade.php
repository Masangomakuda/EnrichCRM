<x-app-layout>
    <x-active>

        <!-- component -->
        <div class="sm:px-6 w-full">
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="flex items-center justify-between">
                    <p tabindex="0"
                        class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                        permissions</p>

                </div>
            </div>
            <div class="bg-white py-4 md:py-7 px-2 md:px-8 xl:px-10">

                <div class="sm:flex items-center justify-between">
                    @can('manage_clients')
                    <button onclick="popuphandler(true)"
                        class="focus:ring-2 focus:ring-offset-2 
                            focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-4 py-2 bg-blue-500 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">
                        <p class="text-sm font-medium leading-none text-white"><a
                                href="{{ route('permissions.create') }}">
                                Add Permission</a></p>
                        </p>
                    </button>
                    @endcan

                    Using Laravel spatie Authorization On USer Model
                </div>








                <div class="mt-7 overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <tbody>

                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                <th>
                                </th>
                                <th> Name</th>

                                <th> Verified @</th>

                                <th> Action </th>
                            </tr>
                            @forelse ($permissions as $permission )
                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                <td>
                                    <div class="ml-5">
                                        <div
                                            class="bg-gray-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">

                                            P
                                        </div>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">{{
                                            $permission->name
                                            }}</p>

                                    </div>
                                </td>

                                <td class="pl-5">
                                    <div class="flex items-center">

                                        <p class="text-sm leading-none text-gray-600 ml-2">{{ $permission->created_at
                                            }}</p>
                                    </div>
                                </td>


                                <td>
                                    <a class="0 inline-flex  text-white rounded
                                    items-start justify-start 
                                    px-3 py-1 bg-green-500" href="{{ route('permissions.show',$permission->id) }}">
                                        View</a>

                                    @can('manage_roles')


                                    <a class="0 inline-flex  text-white
                                    items-start justify-start 
                                    px-3 py-1 bg-yellow-500 focus:outline-none rounded"
                                        href="{{ route('permissions.edit',$permission->id) }}"> Edit</a>


                                    <a class="0 inline-flex  text-white
                                    items-start justify-start 
                                    px-3 py-1 bg-red-500 h focus:outline-none rounded"
                                        href="{{ route('permissions.index') }}"> Delete</a>
                                    @endcan
                                </td>

                            </tr>
                            @empty
                            <strong>No Permssions Found</strong>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </x-active>

</x-app-layout>