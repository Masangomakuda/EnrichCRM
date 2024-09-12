<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <div class="py-1 rounded-none">
                <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 space-x-10">
                            <a href="{{ route('users.index') }}">Users</a>

                            <a href="{{ route('clients.index')}}">Clients</a>
                            <a href="{{ route('projects.index')}}">Projects</a>
                            {{-- <a href="{{ route('users.show',Auth()->user()) }}">Task</a> --}}
                            @can('manage_roles')
                                
                            
                            <a href="{{ route('roles.index') }}">Roles</a>
                            <a href="{{ route('permissions.index') }}">Permission</a>
                            @endcan
                            <a href="{{ route('users.show',Auth()->user()) }}">Profile</a>
                     
                            
                        </div>
                    </div>
                </div>
            </div>
          

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
