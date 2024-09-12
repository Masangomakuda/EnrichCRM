<x-app-layout>
    <x-active>
        <div class="pull-right mt-2">
            <a class="p-1 px-3 rounded-sm  bg-blue-500 text-white hover:bg-blue-700" href="{{ route('roles.index') }}">
                Back</a>
              
                
        </div>
     
        <div>
            <div>
                <div class="pull-left">
                    <h2 class="text-lg font-medium my-2">Update Role</h2>
                </div>
             
            </div>
        </div>
    
        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
        <div >
            <div class="">
                <div class="form-group">
                    <strong>Name:</strong><br/>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'p-1 rounded-sm')) !!}
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <strong class="py-2">Permission:</strong>
                    <br/>
                    @error('permission')
                    <x-form_error_message>
                        {{ $message }}
                    </x-form_error_message>
                    @enderror
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'mt-2')) }}
                        {{ $value->name }}</label>
                    <br/>
                    @endforeach
                </div>
            </div>
            <div class=" text-left">
                <button type="submit" class="bg-green-400 mt-2 px-2 rounded-sm">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
        
    </x-active>
</x-app-layout>