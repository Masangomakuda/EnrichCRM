<x-app-layout>
    <x-active>
        <div class="pull-right mt-2">
            <a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700" href="{{ route('permissions.index') }}">
                Back</a>
                
                
        </div>

            <div class="col-lg-12 margin-tb">
                <div class="pull-left my-2 font-semibold">
                    <h2>Create Permission</h2>
                </div>

            </div>


            {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
            <div class="">
                <div class="">
                    <div class="">
                        <strong>Name:</strong><br />
                        {!! Form::text('name', null, array('placeholder' => 'Manage Roles','class' => 'p-1 w-full rounded-sm my-2')) !!}
                    </div>

                    @error('name')
                    <x-form_error_message>
                        {{ $message }}
                    </x-form_error_message>
                    @enderror
                </div>
               
                <div class="text-left">
                    <button type="submit" class="p-1 px-2 mt-2 bg-green-500 rounded-sm text-white">Add Permission</button>
                </div>
            </div>

            {!! Form::close() !!}

            <p class="text-lg font-bold my-2">Available Permission</p>
<ul>
    @forelse ($permissions as $permission )
    <li class="text-lg font-medium">{{ $permission->name }}</li>
    @empty
    <strong>No Permissions found</strong>

    @endforelse

</ul>
            


   
    </x-active>
</x-app-layout>