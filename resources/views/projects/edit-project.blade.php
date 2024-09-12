<x-app-layout>
    <x-active>

        <div class="sm:px-6 w-full flex-row">

            <x-page-title>
                <p tabindex="0"
                    class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                    Edit Project</p>
            </x-page-title>
        </div>

        <x-back-div>
            <p><a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700"
                    href="{{ route('projects.index') }}">
                    Back</a></p>

        </x-back-div>

        @include('layouts.messages')
        <x-active-page-content>

            {!! Form::model($project, ['method' => 'PATCH','route' => ['projects.update', $project->id]]) !!}

            <button class=" pull-right p-1 px-3 rounded-sm bg-green-500 text-white hover:bg-green-700">Update</button>
            <div class="flex columns-3">
                <div class="p-6 bg-white border-b lg:w-2/4">


                    <strong>Title:</strong><br />
                    {!! Form::text('title', $project->title, array('class' => 'w-full p-2 my-1 rounded-md bg-gray-100 ')) !!}
                    @error('title')
                    <x-form_error_message>
                        {{ $message }}
                    </x-form_error_message>
                    @enderror


                    <strong>Client </strong><br />


                    <select name="client_id" id="defaultSelect" class="w-full p-2 my-1 rounded-md bg-gray-100">
                        <option value="{{ $project->client_id }}"> {{ $project->client->company_name}} </option>
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->company_name }} </option>
                        @endforeach
                    </select>

                    <strong>Assigned User:</strong><br />
                    <select name="user_id" id="defaultSelect" class="w-full p-2 my-1 rounded-md bg-gray-100">
                        <option value="{{ $project->user_id }}"> {{ $project->user->name}} </option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} </option>
                        @endforeach
                    </select>


                    {{-- <select class="form-control m-bot15" name="user_id">

                        @if ($users->count())

                        @foreach($selecteduser as $user)
                        <option value="" {{ $selecteduser ? 'selected="selected"' : '' }}>{{ $selecteduser }}</option>
                        @endforeach
                        https://laracasts.com/discuss/channels/general-discussion/select-dropdown-option-seleted-in-laravel
                        https://www.pakainfo.com/how-to-show-selected-value-from-database-in-dropdown-using-laravel/

                        @endif

                    </select> --}}






                </div>

                <div class="p-6 bg-white border-b lg:w-2/4">
                    <strong>Description:</strong><br />
                    {!! Form::text('description',$project->description, array('class' => 'w-full p-2 my-1 rounded-md bg-gray-100 ')) !!}
                    @error('description')
                    <x-form_error_message>
                        {{ $message }}
                    </x-form_error_message>
                    @enderror
                  
                    <strong>Due Date:</strong><br />
                    <input type="datetime-local" value="{{ $project->duedate }}" name="duedate"
                        class="w-full p-2 my-1 rounded-md bg-gray-100 " />



                    <strong>Status</strong><br />
                    <select class="w-full p-2 my-1 rounded-md bg-gray-100 " name="status" required>
                        @foreach(App\Models\Project::STATUS as $status)
                        <option value="{{ $status }}" {{ (old('status') ? old('status') : $project->status ?? '') ==
                            $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>


            </div>

            {!! Form::close() !!}


            {{-- {{ $project }} --}}
        </x-active-page-content>
    </x-active>
</x-app-layout>