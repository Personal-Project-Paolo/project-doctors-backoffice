<x-app-layout>
    @section('contents')

        <div class=" my-container flex flex-col justify-center ">
                <div class="p-6 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 card text-white">
                    <h1 class="mb-3 font-xxlarge text-white-900 white:text-white-800 ">Benvenuto in BDoctors Dottor/Dottoressa {{ Auth::user()->lastname }}</h1>
                    
                    <p class="mb-3 font-medium text-white-900 white:text-white-800">
                        Siamo lieti di darti il benvenuto nella nostra applicazione, 
                        un potente strumento per semplificare la gestione dei tuoi pazienti e migliorare l'efficienza nella pratica medica. 
                        Con questa applicazione, avrai accesso a una serie di strumenti e risorse utili per la tua professione.
                        Raggiungi subito la tua dashboard.
                    </p>

                    
                        <div>
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="my-second-btn">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                    
                </div>
        </div>
            
    @endsection

</x-app-layout>


<style>
    .my-container{
        background-image: url('https://us.123rf.com/450wm/wstockstudio/wstockstudio1707/wstockstudio170700042/81669810-stetoscopio-isolato-su-sfondo-nero-scrivania-di-medici-sterili-accessori-medici-sullo-sfondo-nero.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        position: relative;
    }
    .card{
        width: 50%;
        height: 70% ;
    }

    .my-second-btn{
        color: #01bdcc;
        margin-left: 1rem;
        border: 2px solid #01bdcc;
        border-radius: .5rem;
        width: 90%;
   }
   
   .my-second-btn:hover{
        color: white;
        background-color:  #01bdcc;
   }


</style>