<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section('contents')
        @auth
            @unless (auth()->user()->doctor)
                <button type="button" class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100">
                    <a href="{{ route('admin.doctors.create') }}">Create a new Profile Doctor</a>
                </button>
            @endunless

            @if (auth()->user()->doctor)
                <!-- Verifica se l'utente è associato a un dottore -->
                <a href="{{ route('admin.doctors.show', ['doctor' => auth()->user()->doctor]) }}">
                    <button type="button" class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100">Visualizza
                        Profilo Dottore</button>
                </a>

                <a href="{{ route('admin.doctors.edit', ['doctor' => auth()->user()->doctor]) }}">
                    <button type="button" class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100">Edita Profilo
                        Dottore</button>
                </a>
            @endif
        @endauth
    @endsection

</x-app-layout>
<style>
    button {
        border: 2px solid black
    }
</style>
