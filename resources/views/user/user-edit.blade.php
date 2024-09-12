<x-app-layout>
    <x-active>

        <div class="">
            <div class="">
                <div class="pull-left">
                    <h2 class="text-xl font-medium mb-2">Edit User</h2>
                </div>
                {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                <div class="pull-right">
                    <a class="0 inline-flex  text-white
                    items-start justify-start 
                    px-4 py-1 bg-blue-700 hover:bg-blue-600 focus:outline-none rounded"
                        href="{{ route('users.index') }}"> Back</a>

                    <button type="submit" class="text-white px-4 py-1 bg-green-500 rounded">Submit</button>

                </div>
            </div>
        </div>


        <div class="">
            <div class="">
                <div class="">
                    <strong>Name:</strong>
                    {!! Form::text('name',old('name'),
                    array('placeholder' => 'Name','class' => 'rounded-sm text-black p-1 w-full mb-4 bg-gray-100')) !!}
                </div>
                @error('name')
                <x-form_error_message>
                    {{ $message }}
                </x-form_error_message>
                @enderror
            </div>
            <div class="">
                <div class="">
                    <strong>Email:</strong>
                    {!! Form::text('email', null,
                    array('placeholder' => 'Email','class' => 'rounded-sm text-black p-1 w-full mb-4 bg-gray-100')) !!}
                </div>
                @error('email')
                <x-form_error_message>
                    {{ $message }}
                </x-form_error_message>
                @enderror
            </div>


            <div class="">
                <div class="">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]',
                    $roles,$userRole, array('class' => 'rounded-sm text-black p-1 w-full mb-4 bg-gray-100','multiple'))
                    !!}
                </div>

                @error('roles')
                <x-form_error_message>
                    {{ $message }}
                </x-form_error_message>
                @enderror


            </div>

        </div>
        {!! Form::close() !!}



    </x-active>
</x-app-layout>