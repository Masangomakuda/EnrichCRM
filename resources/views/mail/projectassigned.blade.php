@component('mail::message')
# Hello {{$user->name}},

You were assigned a Project {{ $project->client }} To run.
<br>
{{$project->title }} added you as teacher.

@component('mail::button', ['url' => ''])
View
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
