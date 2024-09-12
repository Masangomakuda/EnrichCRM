<x-app-layout>
    <x-active>





        @include('layouts.messages')
        <div class="pull-right mt-2">
            <a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700" href="{{ route('roles.index') }}">
                Back</a>
                <a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700" href="{{ route('roles.create') }}">
                    Create Role</a>
                
        </div>
     
         
                <h3 class="my-2 text-base font-semibold">Roles List</h3>

                <table class="w-full whitespace-nowrap">
                    <tbody>

                        <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                          
                            <th> Name</th>

                            <th> Action </th>
                        </tr>

            @forelse ($roles as $role)
                <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                    <td>
                        <p class="mt-1 text-lg"> {{ $role->name}} </p>
                    </td>
                      <td class="flex flex-row">  <a href="{{ route('roles.show',$role) }}" class=" my-2 px-3 mt-2 mr-2 rounded-sm bg-green-400">View</a>
                         <a href="{{ route('roles.edit',$role) }}" class="my-2 px-2 mt-2 mr-2  rounded-sm bg-blue-400">Edit</a>
                      <form action="{{ route('roles.destroy',$role) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button  class="my-2 px-3 mt-2 mr-2 rounded-sm bg-red-400">Delete
                        </button>
                        </form>
                      </td>
                </tr>
                @empty
                 
                <strong>No Roles Found</strong>

                @endforelse

            </tbody>
                </table>


          

            {!! Form::close() !!}
    </x-active>
</x-app-layout>