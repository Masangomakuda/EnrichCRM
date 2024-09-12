<x-app-layout>
    <x-active>

        <!-- component -->
        <div class="sm:px-6 w-full">
            <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
            <div class="px-4 md:px-10 py-4 md:py-7">
                <div class="flex items-center justify-between">
                    <p tabindex="0"
                        class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                        Clients</p>

                </div>
                @include('layouts.messages')
            </div>
            <div class="bg-white py-4 md:py-2 px-4 md:px-8 xl:px-10">
                <div class="sm:flex items-center justify-between">
                    @can('manage_clients')
                    <button onclick="popuphandler(true)"
                        class="focus:ring-2 focus:ring-offset-2 
                            focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-blue-500 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">
                            <a href="{{ route('clients.create') }}">

                                Add Client</a>
                        </p>
                    </button>
                    @endcan

                    Using Laravel Gates and Policies for authorization On clients Model
                </div>
                <div class="mt-7 overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <tbody>

                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                <th>
                                </th>
                                <th>
                                    Company Name
                                </th>

                                <th>
                                    Contact Name
                                </th>
                                <th>
                                    Contact Email
                                </th>

                                <th>
                                    Contact #
                                </th>
                                <th>
                                    Comapny Address
                                </th>

                                <th>
                                    VAT
                                </th>

                                <th>
                                    Action
                                </th>
                            </tr>
                            @foreach ($clients as $client)
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
                                        <p class="text-base font-medium leading-none text-gray-700 mr-2">{{
                                            $client->company_name }}</p>

                                    </div>
                                </td>
                                <td class="pl-24">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667"
                                                stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B"
                                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round">
                                            </circle>
                                        </svg>
                                        <p class="text-sm leading-none text-gray-600 ml-2">{{ $client->contact_name }}
                                        </p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <div class="flex items-center">

                                        <p class="text-sm leading-none text-gray-600 ml-2">{{ $client->contact_email }}
                                        </p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <div class="flex items-center">

                                        <p class="text-sm leading-none text-gray-600 ml-2">{{
                                            $client->contact_phone_number }}</p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <div class="flex items-center">

                                        <p class="text-sm leading-none text-gray-600 ml-2">{{ $client->company_address
                                            }} /{{ $client->company_city }}</p>
                                    </div>
                                </td>
                                <td class="pl-5">
                                    <div class="flex items-center">

                                        <p class="text-sm leading-none text-gray-600 mr-2">{{ $client->company_vat }}
                                        </p>
                                    </div>
                                </td>



                                <td class="flex flex-row">
                                    <a class="0 inline-flex  text-white rounded
                                    items-start justify-start 
                                    px-3 py-1 mr-1 bg-green-500" href="{{ route('clients.show',$client->id) }}">
                                        View</a>




                                    <a class="0 inline-flex  text-white
                                    items-start justify-start 
                                    px-3 py-1 mr-1 bg-yellow-500 focus:outline-none rounded"
                                        href="{{ route('clients.edit',$client) }}"> Edit</a>

                                    @can('manage_clients')

                                    <form action="{{ route('clients.destroy',$client) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="0 inline-flex  text-white
                                    items-start justify-start 
                                    px-3 py-1 bg-red-500 h focus:outline-none rounded"> Delete
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach

                            <tr class="h-3"></tr>



                        </tbody>
                    </table>
                    <div class="p-5">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>



    </x-active>

</x-app-layout>