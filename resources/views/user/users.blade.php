<x-app-layout>
    <x-active>






        <!-- component -->
        <div class="w-full sm:px-6">
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
            <div class="px-4 py-4 md:px-10 md:py-7">
                <div class="flex items-center justify-between">
                    <p tabindex="0"
                        class="text-base font-bold leading-normal text-gray-800 focus:outline-none sm:text-lg md:text-xl lg:text-2xl">
                        Users <br/>
                        User Who Are Admins  -{{  $usercount }}</p>
                        @include('layouts.messages')
                </div>
               @include('layouts.messages')
            </div>
            <div class="px-2 py-2 bg-white md:py-3 md:px-8 xl:px-10">

                <div class="items-center justify-between sm:flex">
                    @can('manage_clients')
                    <button onclick="popuphandler(true)"
                        class="inline-flex items-start justify-start px-6 py-3 mt-4 bg-blue-500 rounded focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 sm:mt-0 focus:outline-none">
                        <p class="text-sm font-medium leading-none text-white">
                        <p class="text-sm font-medium leading-none text-white"><a href="{{ route('users.create') }}">
                                Add User</a></p>
                        </p>
                    </button>
                    @endcan

                    Using Laravel spatie Authorization On User Model
                </div>








                <div class="overflow-x-auto mt-7">
                    <table class="w-full whitespace-nowrap">
                        <tbody>

                            <tr tabindex="0" class="h-16 border border-gray-100 rounded focus:outline-none">
                                <th>
                                    Is Admin?
                                </th>
                                <th> Image </th>
                                <th> Name</th>

                                <th> Email</th>
                                <th> Verified @</th>
                              
                                <th> Action </th>
                            </tr>
                            @foreach ($users as $user)
                            <tr tabindex="0" class="h-16 border border-gray-100 rounded focus:outline-none">
                                <td>
                                    <div class="ml-5">
                                        <div
                                            class="relative flex items-center justify-center flex-shrink-0 w-5 h-5 bg-gray-200 rounded-sm">

                                            @if ( $user->is_admin == 1 )
                                            {
                                                Yes
                                            }
                                            @else{

                                           NO
                                            }                                                
                                            @endif
                                          
                                        </div>
                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <img src="/storage/{{$user->image}}"
                                        class="flex-shrink-0 object-center w-20 h-20 mb-4 rounded-lg object-fit sm:mb-0" alt="..." />

                                    </div>
                                </td>
                                <td class="">
                                    <div class="flex items-center pl-5">
                                        <p class="mr-2 text-base font-medium leading-none text-gray-700">{{ $user->name
                                            }}</p>

                                    </div>
                                </td>
                                <td class="pl-24">
                                    <div class="flex items-center">

                                        <p class="ml-2 text-sm leading-none text-gray-600">{{ $user->email }}</p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <div class="flex items-center">

                                        <p class="ml-2 text-sm leading-none text-gray-600">{{ $user->email_verified_at
                                            }}</p>
                                    </div>
                                </td>


                                <td class="flex flex-row">
                                    <a class="inline-flex items-start justify-start px-3 py-1 mr-1 text-white bg-green-500 rounded 0" href="{{ route('show_user_roles',$user->id) }}"> View</a>

                              


                                    <a class="inline-flex items-start justify-start px-3 py-1 mr-1 text-white bg-yellow-500 rounded 0 focus:outline-none"
                                        href="{{ route('users.edit',$user->id) }}"> Edit</a>


                                        <form action="{{ route('users.destroy',$user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                    <button class="inline-flex items-start justify-start px-3 py-1 text-white bg-red-500 rounded 0 h focus:outline-none"
                                        > Delete</button>
                                        </form>
                                </td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </x-active>

</x-app-layout>