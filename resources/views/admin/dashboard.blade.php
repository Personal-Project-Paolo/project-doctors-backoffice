<x-app-layout>
    @section('contents')

        <div class=" my-container flex flex-col justify-center items-center ">
                <div class="ml-4 p-6 border  rounded-lg shadow card flex flex-col justify-between ">

                    <h1 class="mb-10 max-w-lg text-4xl font-semibold leading-normal">Benvenuto/a in BDoctors Dottor/Dottoressa <span class="text-6xl font-extrabold text-white-900 dark:text-white uppercase ">{{ Auth::user()->lastname }}</span></h1>
                
                    <p class="mb-3 max-w-lg text-3xl font-semibold ">
                            Nella tua <span class="uppercase text-4xl">dasboard</span> potrai:      
                    </p>
                    <ul>
                        <li class="mb-5"><span class="uppercase uppercase text-2xl "> <i class="fa-solid fa-user-doctor my-icon"></i> Gestire </span>facilmente il tuo profilo</li>
                        <li class="mb-5"><span class="uppercase uppercase text-2xl "> <i class="fa-solid fa-envelope-open-text   my-icon"></i> Comunicare </span>in maniera sicura con i tuoi pazienti</li>
                        <li class=""><span class="uppercase uppercase text-2xl"> <i class="fa-solid fa-people-group   my-icon"></i> Scegliere </span>il tuo piano di sponsorizzazionne</li>
                    </ul>
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
        background-color: rgba(242, 249, 247, 0.5);
    }

    .my-icon{
        background-color:  #01bdcc;
        color: white;
        border: 1px solid white;
        border-radius: 1.5rem;
        padding: .5rem;
   }
   
   .my-icon:hover{
        color: #01bdcc;
        background-color: white;
        border: 1px solid #01bdcc;
   }


</style>