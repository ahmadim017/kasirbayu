<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <body>
        <div class="card shadow mb-4">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome Admin, <span class="badge badge-primary"></span> <br>
                    You are logged in!
                </div>
            </div>
</div>  
    </body>
</x-app-layout>