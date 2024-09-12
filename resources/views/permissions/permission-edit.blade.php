<x-app-layout>
    <x-active>

        <div class="pull-right mt-2">
            <a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700" href="{{ route('permissions.index') }}">
                Back</a>
              
                
        </div>
     
        <div>
            <div>
                <div class="pull-left">
                    <h2 class="text-lg font-medium my-2">Update Permission</h2>
                </div>
             
            </div>
        </div>
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        {!! Form::model($permissions, ['method' => 'PATCH','route' => ['permissions.update', $permissions->id]]) !!}

        <div class="">
            <div class="form-group">
                <strong>Name:</strong><br/>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'p-1 rounded-sm')) !!}
            </div>
        </div>
        
        @error('name')
        <x-form_error_message>
            {{ $message }}
        </x-form_error_message>
        @enderror

        <div class=" text-left">
            <button type="submit" class="bg-green-400 mt-2 px-2 rounded-sm">Submit</button>
        </div>
        {!! Form::close() !!}

    </x-active>
</x-app-layout>