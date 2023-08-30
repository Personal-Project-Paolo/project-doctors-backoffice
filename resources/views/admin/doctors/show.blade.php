<x-app-layout>
    @section('contents')
    
        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-6">
                    <div class="col-span-1">
                        <img src="/storage/{{$doctor->image}}" alt="" class="h-96 w-full object-cover rounded-lg">
                    </div>
                    <div class="col-span-2 md:col-span-1 lg:col-span-2">
                        <h1 class="text-3xl font-semibold mb-2">{{ $doctor->user->name }}</h1>
                        <p class="text-gray-600">{{ $doctor->user->lastname }}</p>
                        <p class="text-gray-600">{{ $doctor->user->email }}</p>
                        <p class="text-gray-600">{{ $doctor->user->address }}</p>
                        <p class="text-gray-600">{{ $doctor->telephone }}</p>
                        <p class="text-gray-600">{{ $doctor->performance }}</p>
                    </div>
                </div>
                <div class="p-6">
                    {{-- Mostra il link solo se c'è un curriculum --}}
                    @if ($doctor->curriculum_vitae)
                        <p class="text-gray-600">
                            <a class="text-blue-600 hover:underline" href="{{ route('admin.doctors.showCurriculum', ['id' => $doctor->id]) }}">Visualizza Curriculum</a>
                        </p>
                    @endif
                </div>
                <div class="p-6">
                    <form
                        action="{{ route('admin.doctors.destroy', ['doctor' => $doctor->id]) }}"
                        method="post"
                        class="d-inline-block mx-1"
                    >
                        @csrf
                        @method('delete')
                        <button class="px-4 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 bg-red-600 hover:bg-red-700 text-white">
                            Elimina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    
    @endsection
</x-app-layout>

<x-app-layout>
    @section('contents')

        <img src="/storage/{{$doctor->image}}" alt="" class="h-96">
        
        
        <p>{{ $doctor->user->name }}</p>
    
    
        <span>{{ $doctor->user->lastname }}</span>
    
    
        <p>{{ $doctor->user->email }}</p>
    
    
        <p>{{ $doctor->user->address}}</p>
    
    
        <p>{{ $doctor->telephone }}</p>
    
    
    
        <p>{{ $doctor->performance }}</p>

        {{-- <p><a class="text-decoration-none" href="{{ $doctor->curriculum_vitae }}">Link Curriculum</a></p> --}}

        

        <form
            action="{{ route('admin.doctors.destroy', ['doctor' => $doctor->id]) }}"
            method="post"
            class="d-inline-block mx-1"
        >
            @csrf
            @method('delete')
            <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                Delete
            </button>
        </form>
                          
    @endsection

</x-app-layout>