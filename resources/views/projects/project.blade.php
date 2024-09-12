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
               Project</p>
            </x-page-title>
      
 
        </div>

        @include('layouts.messages')
        <x-active-page-content>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div>
                    <strong>Project Title:</strong>
                    {{ $project->title  }}
                </div>

                <div>
                    <strong>Assigned tech:</strong>
                    {{ $project->user->name }}
                </div>

                <div>
                    <strong>Description:</strong>

                    {{ $project->description  }}
                </div>

                <div>
                    <strong>Company:</strong>

                    {{ $project->client->company_name }}
                    <div>
                     
                         <ul class="ml-10">
                            <li><strong>Contact-name</strong> - {{ $project->client->contact_name }}</li>
                            <li><strong>Contact-Email</strong> - {{ $project->client->contact_email }}</li>
                            <li><strong>Contact-Phone</strong> - {{ $project->client->contact_phone_number }}</li>
                         </ul>
                      </div>
                </div>

                <div>
                    <strong>Description:</strong>

                    {{ $project->status  }}
                </div>
            </div>

      


   
        
           



        </x-active-page-content>
    </x-active>
</x-app-layout>