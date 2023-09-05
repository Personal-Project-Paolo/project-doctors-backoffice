<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   
            @section('contents')  
            <div class="my-container">
                    <div class="btn-container">
                        @auth
                            @unless (auth()->user()->doctor)
                                <button type="button" class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100 my-btn">
                                    <a href="{{ route('admin.doctors.create') }}">Create a new Profile Doctor</a>
                                </button>
                            @endunless

                            @if (auth()->user()->doctor)
                                <!-- Verifica se l'utente è associato a un dottore -->
                                <a href="{{ route('admin.doctors.show', ['doctor' => auth()->user()->doctor]) }}">
                                    <button type="button" class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100 my-btn">Visualizza
                                        Profilo Dottore</button>
                                </a>

                                <a href="{{ route('admin.doctors.edit', ['doctor' => auth()->user()->doctor]) }}">
                                    <button type="button" class="my-8 px-8 py-3 font-semibold border rounded dark:text-gray-100 my-btn">Edita Profilo
                                        Dottore</button>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
        @endsection
   

        

   

</x-app-layout>
<style>

    
    .my-container{
        position: relative;
        background-image: url('https://us.123rf.com/450wm/wstockstudio/wstockstudio1707/wstockstudio170700042/81669810-stetoscopio-isolato-su-sfondo-nero-scrivania-di-medici-sterili-accessori-medici-sullo-sfondo-nero.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
    }

    .btn-container{
            
            height: 30%;
            width: 20%;
            position: absolute;
            bottom: 30%;
            right: 15%;
    }
    .my-btn{
            background-color: #01bdcc;
            color: white;
            border: 2px solid white;
            border-radius: .5rem;
            width: 100%;
    }
</style>
