<x-app-layout>
    
    @section('contents')

        <div class="py-6 px-4 sm:px-6 lg:px-8" style="background-color: #F9FAFB;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6" style="background-color: #FFFFFF;">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <div>
                            <img src="/storage/{{$doctor->image}}" alt="{{$doctor->user->name}}"
                            class="h-96 w-full object-cover rounded-lg shadow-md">
                        </div>
                        <div class="my-4 flex">
                            @auth
                                @if(auth()->user()->doctor) <!-- Verifica se l'utente è associato a un dottore -->
                                    <a href="{{ route('admin.doctors.edit', ['doctor' => auth()->user()->doctor]) }}">
                                        <button type="button" class=" px-8 py-3 font-semibold border rounded dark:text-gray-100  hover:bg-gray-300">Edita Profilo Dottore</button>
                                    </a>
                                @endif
                            @endauth
                            <form
                                action=""
                                data-template="{{ route('admin.doctors.destroy', ['doctor' => '*****'], ['doctor'=> $doctor->id]) }}"
                                method="POST"
                                class="d-inline-block"
                                id="confirm-delete"
                                >
                                @csrf
                                @method('delete')
                                    <button class="px-4 py-3 font-semibold border rounded bg-red-500 hover:bg-red-700">Elimina</button>
                            </form>
                        </div>

                             
                    </div>
                    <div class="col-span-2 md:col-span-1 lg:col-span-2 flex flex-col justify-center">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold mb-2 text-gray-800">{{$doctor->user->name}}</h1>
                        <p class="px-2 text-xl md:text-2xl text-gray-600">{{$doctor->user->lastname}}</p>
                        <p class="px-2 text-lg text-gray-600">{{$doctor->user->email}}</p>
                        <p class="px-2 text-lg text-gray-600">{{$doctor->user->address}}</p>
                        <p class="px-2 text-lg text-gray-600">{{$doctor->telephone}}</p>
                        <p class="px-2 py-2 text-lg text-gray-800">{{$doctor->performance}}</p>
                        <div class="px-2 py-2 text-justify w-72">
                            @foreach ($doctor->user->specializations as $specialization)
                                <p class="text-sm md:text-base text-center bg-blue-500 text-white px-2 py-1 rounded-full mr-2 mb-2">{{$specialization->name}}</p>
                            @endforeach
                        </div>
                        <div class="px-2 py-2">
                            @foreach ($doctor->promotions as $promotion)
                                <span class="text-sm md:text-base bg-green-500 text-white px-3 py-1 rounded-full mr-2 mb-2">{{$promotion->name}}</span>
                            @endforeach
                        </div>
                    </div>

                </div>
                
                <div class="p-6">
                    @if ($doctor->curriculum_vitae)
                        <p class="text-gray-600">
                            <a class="text-blue-500 hover:underline" href="{{ $doctor->curriculum_vitae }}">Link Curriculum</a>
                        </p>
                    @endif
                </div>
                <div class="p-6 flex">
                    

                   
                    <div>
                        <button class="px-4 py-2 font-semibold border rounded bg-blue-500 hover:bg-blue-700">
                            <x-nav-link :href="route('admin.messages.index')" :active="request()->routeIs('messages')">
                                <span class="text-white font-extrabold">{{ __('Messages') }} </span>
                            </x-nav-link>
                        </button>
                    </div>

                    
                    <div>
                        <button class="px-4 py-2 font-semibold border rounded bg-blue-500 hover:bg-blue-700">
                            <x-nav-link :href="route('admin.reviews.index')" :active="request()->routeIs('reviews')">
                                <span class="text-white font-extrabold">{{ __('Reviews') }}</span>
                            </x-nav-link>
                        </button>
                    </div> 
                    
                </div>
            </div>
        </div>

    @endsection
</x-app-layout>