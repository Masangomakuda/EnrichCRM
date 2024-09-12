<x-app-layout>
    <x-active>


        <div class="flex flex-wrap columns-2  overflow-hidden shadow-sm mt-2">
            <div class="p-6  lg:w-1/4 ml-20 bg-white ">
                <p class="font-medium text-l mb-2 underline">Contact Details</p>
                {{ $client->contact_name }}
                {{ $client->contact_phone_number }}
                {{ $client->contact_email }}
            </div>

            <div class="p-6 border-l mr-1   border-red-700 lg:w-2/4 ml-20 ">
                <p class="font-medium text-l mb-2 underline">Company Details</p>
                {{ $client->company_name }}
                {{ $client->company_address }}
                {{ $client->company_city }}
           
                {{ $client->company_vat }}
            </div>

        </div>

 
   

  
    </x-active>
</x-app-layout>




    



