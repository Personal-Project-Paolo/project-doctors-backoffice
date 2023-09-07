<x-app-layout>
    
    @section('contents')

        <div class="py-6 px-4 sm:px-6 lg:px-8" style="background-color: #F9FAFB;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6" style="background-color: #FFFFFF;">
                <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-2 lg:col-span-1  ">

                        <div>
                            <img src="/storage/{{$doctor->image}}" alt="{{$doctor->user->name}}"
                            class="h-96 w-full object-cover rounded-lg shadow-md">
                        </div>

                        <div class="p-6  flex justify-center " >
                            <div>
                                <x-nav-link :href="route('admin.messages.index')" :active="request()->routeIs('messages')">
                                    <button type="button" class=" px-8 py-3 font-semibold my-btn ">
                                        <span >{{ __('Messages') }} </span>
                                    </button>
                                 </x-nav-link>
                            </div>
        
                            <div>
                                <x-nav-link :href="route('admin.reviews.index')" :active="request()->routeIs('reviews')">
                                    <button type="button" class=" px-8 py-3 font-semibold my-btn"  >
                                         <span >{{ __('Reviews') }}</span>
                                    </button>
                                </x-nav-link>    
                            </div> 
                            
                        </div>

                        <div class="p-6 w-90 flex justify-center">
                            @auth
                                @if(auth()->user()->doctor) <!-- Verifica se l'utente è associato a un dottore -->
                                    <a href="{{ route('admin.doctors.edit', ['doctor' => auth()->user()->doctor]) }}">
                                        <button type="button" class=" px-8 py-3 font-semibold my-second-btn">Edita Profilo Dottore</button>
                                    </a>
                                @endif
                            @endauth
                            <button class="px-8 py-3 font-semibold my-second-btn " onclick="window.location='{{ route('admin.doctors.payment', ['doctor' => $doctor]) }}'">Sponsorize</button>
                            <form
                                action=""
                                data-template="{{ route('admin.doctors.destroy', ['doctor' => '*****'], ['doctor'=> $doctor->id]) }}"
                                method="POST"
                                class="d-inline-block"
                                id="confirm-delete"
                                >
                                @csrf
                                @method('delete')
                                    <button class=" px-8 py-3 font-semibold my-second-btn">Elimina Profilo Dottore</button>
                            </form>
                            
                        </div>

                      
                    </div>
                    <div class="col-span-3 md:col-span-2 lg:col-span-1  ">
                        <div>
                            <p class="text-4xl md:text-5xl lg:text-6xl font-semibold mb-2 text-gray-800">{{$doctor->user->name}}</p>
                            <p class=" text-4xl md:text-5xl lg:text-6xl font-semibold mb-2 text-gray-800">{{$doctor->user->lastname}}</p>
                            <p>Email: <span class="px-2 text-lg  font-black">{{$doctor->user->email}}</span></p>
                            <p>Indirizzo: <span class="px-2 text-lg font-black">{{$doctor->user->address}}</span></p>
                            <p>Telefono: <span class="px-2 text-lg font-black">{{$doctor->telephone}}</p>
                            <p>Prestazioni: <span class="px-2 text-lg font-black">{{$doctor->performance}}</span></p>
                            <span class=" flex flex-col justify-center ">
                                @if ($doctor->curriculum_vitae)
                                    <span>
                                        <a class=" text-sm md:text-base rounded-full link-CV " href="{{ $doctor->curriculum_vitae }}">Link Curriculum</a>
                                    </span>
                                @endif
                            </span>
                            <div class="flex flex-col justify-center">
                                <div>
                                    @foreach ($doctor->promotions as $promotion)
                                       <p>Promozioni attive: <span class="text-sm md:text-base bg-500 text-white px-3 py-1 rounded-full mr-2 mb-2 promotion">{{$promotion->name}}</span></p>
                                    @endforeach
                                </div>
                                
                            </div> 
                        </div>
                    </div>
               
                    <div class="col-span-3 md:col-span-2 lg:col-span-1 ">
                        <div class="px-2 py-4 text-justify w-100 flex flex-col ">
                            @foreach ($doctor->user->specializations as $specialization)
                               <span class="text-sm md:text-base text-center bg-500 text-white px-2 py-1 rounded-full mr-2 mb-2 specialization ">{{$specialization->name}}</span>
                           @endforeach
                        </div>  
                    </div>
                </div>
                
                
                
            </div>
        </div>
    
    @endsection

</x-app-layout>





<style>


    
    .promotion{
        color: #7ce2e0;
        border: 2px solid #7ce2e0;
        border-radius: 2rem;
        
    }
    .specialization{
        color: white;
        background-color:  #7ce2e0; 
        border: 2px solid white;
        border-radius: 2rem;
    }


    .link-CV{
        color: black;
        background-color: white  ; 
       
    }

    .link-CV:hover{
        color: #01bdcc;
    }
    .my-btn{
        background-color: #01bdcc;
        color: white;
        border: 2px solid white;
        border-radius: .5rem;
        width: 100%;
        margin-left: 1rem;
        

   }

   .my-btn:hover{
        color: #01bdcc;
        background-color: white;
        border: 2px solid #01bdcc;
      
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