@component('mail::message')
Hi {{ $user->name }}

project {{ $project->title }} of {{ $project->client->company_name  }}Has been
assigned To you

@component('mail::button', ['url' => route('projects.show',$project->id)])
View Project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
