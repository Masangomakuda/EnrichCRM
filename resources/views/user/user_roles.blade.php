<x-app-layout>

    <x-active>

        <div>
            <div>
                <div class="pull-left">
                    <h2 class="text-xl font-medium mb-2"> Show User Roles</h2>
                </div>
                <div class="pull-right">
                    <a class="0 inline-flex  text-white
                    items-start justify-start 
                    px-3 py-1 bg-blue-700 hover:bg-blue-600 focus:outline-none rounded" href="{{ route('users.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div>
                <div>
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="">
                <div>
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="">
                <div class="mb-2">
                    <strong>Roles:</strong>
                   
                    {{-- @if(!empty($user->getRoleNames())) --}}
                    
                        @forelse($user->getRoleNames() as $roles)
                           <p class="font-semibold text-base ml-12"># {{ $roles }} </p>
                           @empty
                           <p class="font-semibold text-base ml-12"># No Roles Assigned to {{ $user->name }} </p>
                           @endforelse
                    {{-- @endif --}}
                </div>
                <a class="0 inline-flex  text-white
                    items-start justify-start 
                    px-3 py-1 bg-yellow-500 rounded" href="{{ route('users.edit',$user->id) }}"> Edit </a>

                    <a class="0 inline-flex  text-white
                    items-start justify-start 
                    px-3 py-1 bg-red-500 rounded" href="{{ route('users.index') }}"> Delete </a>
            </div>
        </div>
    </x-active>
</x-app-layout>
