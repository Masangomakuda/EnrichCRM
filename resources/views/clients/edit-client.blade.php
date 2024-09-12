<x-app-layout>
    <x-active>


        {!! Form::model($client, ['method' => 'PATCH','route' => ['clients.update', $client->id]]) !!}
        <div class="pull-right">
            <a class="0 inline-flex  text-white
            items-start justify-start 
            px-4 py-1 bg-blue-700 hover:bg-blue-600 focus:outline-none rounded"
                href="{{ route('users.index') }}"> Back</a>

            <button type="submit" class="text-white px-4 py-1 bg-green-500 rounded">Submit</button>


            <div class="mb-1">
                {{ Form::label('Name', 'Contact Name',) }}
                <div class="">               
                    {!! Form::text('contact_name',old('	contact_name'),
                    array('placeholder' => 'Name','class' => 'rounded-sm text-black p-1 w-1/3 my-2 bg-gray-100')) !!}
                </div>
                @error('name')
                <x-form_error_message>
                    {{ $message }}
                </x-form_error_message>
                @enderror
            </div>


            
            <div class="mb-1">
                {{ Form::label('Name', 'Contact Email',) }}
                <div class="">               
                    {!! Form::text('contact_email',old('contact_email'),
                    array('placeholder' => 'Name','class' => 'rounded-sm text-black p-1 w-1/3 my-2 bg-gray-100')) !!}
                </div>
                @error('emaill')
                <x-form_error_message>
                    {{ $message }}
                </x-form_error_message>
                @enderror
            </div>


            
            <div class="mb-1">
                {{ Form::label('Name', 'Contact #',) }}
                <div class="">               
                    {!! Form::text('contact_phone_number',old('contact_phone_number'),
                    array('placeholder' => 'Name','class' => 'rounded-sm text-black p-1 w-1/3 my-2 bg-gray-100')) !!}
                </div>
                @error('contact_phone_number')
                <x-form_error_message>
                    {{ $message }}
                </x-form_error_message>
                @enderror
            </div>



            
            <div class="mb-1">
                {{ Form::label('Name', 'company_name',) }}
                <div class="">               
                    {!! Form::text('company_name',old('company_name'),
                    array('placeholder' => 'Name','class' => 'rounded-sm text-black p-1 w-1/3 my-2 bg-gray-100')) !!}
                </div>
                @error('name')
                <x-form_error_message>
                    {{ $message }}
                </x-form_error_message>
                @enderror
            </div>



            
        



          

        </div>

        {!! Form::close() !!}
    </x-active>
</x-app-layout>