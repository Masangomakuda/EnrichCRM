<x-app-layout>
    <x-active>
        <div class="pull-right mt-2">
            <a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700" href="{{ route('roles.index') }}">
                Back</a>
                
                
        </div>

            <div class="col-lg-12 margin-tb">
                <div class="pull-left my-2 font-semibold">
                    <h2>Create New Role</h2>
                </div>

            </div>


            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="">
                <div class="">
                    <div class="">
                        <strong>Name:</strong><br />
                        {!! Form::text('name', null, array('placeholder' => 'Admin or Accounts or Student or
                        lecturer e.t.c ','class' => 'p-1 w-full rounded-sm my-2')) !!}
                    </div>

                    @error('name')
                    <x-form_error_message>
                        {{ $message }}
                    </x-form_error_message>
                    @enderror
                </div>
                <div>
                    <div>
                        <strong>Permission:</strong>
                        <br />
                        @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->name }}</label>
                        <br />
                        @endforeach
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" class="p-1 px-2 mt-2 bg-green-500 rounded-sm text-white">Add Role</button>
                </div>
            </div>
            {!! Form::close() !!}
   
    </x-active>
</x-app-layout>