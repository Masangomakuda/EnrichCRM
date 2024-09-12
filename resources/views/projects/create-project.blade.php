<x-app-layout>
    <x-active>
        <x-back-div>
            <p ><a class="p-1 px-3 rounded-sm bg-blue-500 text-white hover:bg-blue-700" href="{{ route('projects.index') }}">
                Back</a></p>
       
        </x-back-div>

        <div class="sm:px-6 w-full">
     
            <x-page-title>
                <p tabindex="0"
                class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
               Create Project</p>
            </x-page-title>
      
 
        </div>
   
     
        <x-active-page-content>

            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <button type="submit" class="p-1 px-3 ml-8 rounded-sm bg-green-500 text-white hover:bg-green-700">
                    Save</button>
                <div class="flex columns-3">
                <div class="p-6 bg-white border-b lg:w-2/4">
                    <strong>Title</strong>
                    @error('title')
                    <x-form_error_message>
                        {{ $message }}
                    </x-form_error_message>
                    @enderror
                    <input type="text" name="title" class="w-full p-2 my-1 rounded-md bg-gray-100 "/>

                    <strong>client</strong>
                    <select class="w-full p-2 my-1 rounded-md bg-gray-100" name="client_id" id="user_id" required>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ old('user') == $client->id ? 'selected' : '' }}>{{ $client->company_name }}</option>
                        @endforeach
                    </select>

                    <strong>Description</strong>
                    <input type="text" name="description" class="w-full p-2 my-1 rounded-md bg-gray-100 "/>
                </div>

             
           
            
                <div class="p-6 bg-white border-b lg:w-2/4">

                    <strong>user</strong>
           
                    <select class="w-full p-2 my-1 rounded-md bg-gray-100" name="user_id" id="user_id" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>

                    <strong>dealine</strong>
                    <input type="date" name="duedate" class="w-full p-2 my-1  rounded-md bg-gray-100 "/>

                    {{-- <strong>status</strong>
                    <select class="w-full p-2 my-1 rounded-md bg-gray-100" name="status" id="user_id" required>
                      
                    <option >Open</option>
                    <option >Inprogress</option>
                    <option >Cancelled</option>
                    <option >Completed</option>
                     
                    </select> --}}
                </div>
                </div>

               
            </form>

        </x-active-page-content>
    </x-active>
</x-app-layout>