<x-app-layout>

@section('contents')
    <section class="m-6 p-6 dark:bg-gray-800 dark:text-gray-50">
        <div class="p-5">
            <h1 style="font-weight:700; font-size:30px">Edit Profile Doctor</h1>
            <form 
            method="POST" 
            action="{{ route('admin.doctors.update', ['doctor' => $doctor])}}" 
            enctype="multipart/form-data" 
            novalidate
            class="container flex flex-col mx-auto space-y-12"
            >
                {{-- Per protezione dati --}}
                @csrf 
                {{-- Per protezione dati --}}
                @method('PUT')

                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <p class="font-medium">Informations</p>
                        <p class="text-xs">Put the information here to create a new project</p>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        {{-- Telephone del dottore --}}
            
                        <div class="col-span-full sm:col-span-3">
                            <label 
                            for="telephone" class="form-label" style="font-weight:700; font-size:20px">
                                Telephone
                            </label>
                            <input 
                            type="text" 
                            class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('telephone') is-invalid @enderror" 
                            id="telephone" 
                            name="telephone" 
                            value="{{ old('telephone', $doctor->telephone)}}">
                
                            <div class="invalid-feedback">
                                @error('telephone') {{ $message }} @enderror
                            </div>
                        </div>

                        {{-- Prestastioni del dottore --}}
                
                        <div class="col-span-full sm:col-span-3">
                            <label for="performance" class="form-label" style="font-weight:700; font-size:20px">
                                Performace
                            </label>
                            <input 
                            type="text" 
                            class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('performance') is-invalid @enderror" 
                            id="performance" 
                            name="performance" 
                            value="{{ old('performance', $doctor->performance)}}">
                
                            <div class="invalid-feedback">
                                @error('performance') {{ $message }} @enderror
                            </div>
                        </div>

                    
                    </div>
                </fieldset>
        
                <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                    <div class="space-y-2 col-span-full lg:col-span-1">
                        <p class="font-medium">Other Informations</p>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        {{-- Immagine Profilo del Dottore --}}

                        <div class="col-span-full sm:col-span-3">
                            <label for="image" class="form-label"style="font-weight:700; font-size:20px">
                                Image
                            </label>
                            <div class="input-group mb-3">
                                <input type="file" 
                                class="form-control @error('image') is-invalid @enderror" 
                                id="image" name="image" accept="image/*">
                            </div>
                            <div class="invalid-feedback">
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>

                        {{-- Curriculum del Dottore --}}

                        <div class="col-span-full sm:col-span-3">
                            <label for="curriculum_vitae" class="form-label"style="font-weight:700; font-size:20px">
                                Curriculum vitae
                            </label>
                            <div class="input-group mb-3">
                                <input type="file" 
                                class="form-control @error('curriculum_vitae') is-invalid @enderror" 
                                id="curriculum_vitae" name="curriculum_vitae">
                            </div>
                            <div class="invalid-feedback">
                                @error('curriculum_vitae') {{ $message }} @enderror
                            </div>
                        </div>

                        <!-- Promozioni -->

                        <div class="mb-4 sm:col-span-3">
                            <h6 class="text-lg font-medium">Sponsors</h6>
        
                                <div class="flex items-center mb-2">
                                    {{-- <label for="sponsor" class="block text-sm font-medium text-white">sponsor</label> --}}
                                    <select class="form-select mt-1 block w-full py-2 px-3 border  bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('promotion_id') border-red-500 @enderror" id="promotion" name="promotion_id">
                                        <option selected>Change promotion</option>
        
                                        @foreach ($promotions as $promotion)
                                            <option value="{{ $promotion->id }}"
                                                @if (in_array($promotion->id, old('promotions', $doctor->promotions->pluck('id')->all()))) selected
                                                @endif
                                                >
                                                {{ $promotion->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
        
                            @error('promotions')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>

                    
                </fieldset>

                <div class="mb-4">
                    <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded">Salva</button>
                </div>
            
                
                

            </form>
            
        </div>
    </section>
@endsection

</x-app-layout>

<style>
    .invalid-feedback{
        color:red;
    }
</style>
