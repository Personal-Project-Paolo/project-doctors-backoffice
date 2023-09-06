<x-app-layout>

@section('contents')
    <section class="m-6 p-6 dark:bg-gray-800 dark:text-gray-50">
        <div class="p-5">
            <h1 style="font-weight:700; font-size:30px colour-text">Edit Profile Doctor</h1>
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
                        <p class="font-medium colour-text">Informations</p>
                        <p class="text-xs ">Put the information here to edit your profile</p>
                    </div>

                    
                    {{-- <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3"> --}}
                            
                        {{-- Name del dottore - Slug --}}
                        
                        {{-- <div class="col-span-full sm:col-span-3">
                            <label 
                            for="name" class="form-label" style="font-weight:700; font-size:20px">
                                Name
                            </label>
                            <input 
                            type="text" 
                            class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('name') is-invalid @enderror" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $doctor->name)}}">
                
                            <div class="invalid-feedback">
                                @error('name') {{ $message }} @enderror
                            </div>
                        </div> --}}
                    {{-- </div> --}}

                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        
                        {{-- Telephone del dottore --}}
            
                        <div class="col-span-full sm:col-span-3">
                            <label 
                            for="telephone" class="form-label colour-text" style="font-weight:700; font-size:20px">
                                Telephone
                            </label>
                            <input 
                            type="text" 
                            class="my-second-btn w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('telephone') is-invalid @enderror" 
                            id="telephone" 
                            name="telephone" 
                            value="{{ old('telephone', $doctor->telephone)}}">
                
                            <div class="invalid-feedback">
                                @error('telephone') {{ $message }} @enderror
                            </div>
                        </div>

                        {{-- Prestastioni del dottore --}}
                
                        <div class="col-span-full sm:col-span-3">
                            <label for="performance" class="form-label colour-text" style="font-weight:700; font-size:20px">
                                Performace
                            </label>
                            <input 
                            type="text" 
                            class=" my-second-btn w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('performance') is-invalid @enderror" 
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
                        <p class="font-medium colour-text">Other Informations</p>
                    </div>
                    <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">

                        {{-- Immagine Profilo del Dottore --}}

                        <div class="col-span-full sm:col-span-3">
                            <label for="image" class="form-label colour-text"style="font-weight:700; font-size:20px">
                                Image
                            </label>
                            <div class="input-group mb-3">
                                <input type="file" 
                                class="form-control my-second-btn  @error('image') is-invalid @enderror" 
                                id="image" 
                                name="image" 
                                accept="image/*">
                            </div>
                        </div>
                            <div class="invalid-feedback">
                                @error('image') {{ $message }} @enderror
                            </div>
                        </div>

                        {{-- Curriculum del Dottore --}}

                        <div class="col-span-full sm:col-span-3">
                            <label for="curriculum_vitae" class="form-label  colour-text"style="font-weight:700; font-size:20px">
                                Curriculum vitae
                            </label>
                            <div class="input-group mb-3 my-second-btn">
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
                            <h6 class="text-lg font-medium colour-text">Sponsors</h6>
        
                                <div class="flex items-center mb-2">
                                    {{-- <label for="sponsor" class="block text-sm font-medium text-white">sponsor</label> --}}
                                    <select class="my-second-btn form-select mt-1 block w-full py-2 px-3 border  bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-500 sm:text-sm @error('promotion_id') border-red-500 @enderror" id="promotion" name="promotion_id">
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
                    <button type="submit" class="my-btn">Salva</button>
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

    .colour-text{
        color: #01bdcc;
    }

    .my-btn{ 
        width: 100%;
        background-color: #01bdcc;
        color: white;
        border: 2px solid white;
        border-radius: .5rem;
       
   }

   .my-btn:hover{
        color: #01bdcc;
        background-color: white;
        border: 2px solid #01bdcc;
      
   }


   .my-second-btn{
        color: black
        margin-left: 1rem;
        border: 2px solid #01bdcc;
        border-radius: .5rem;
        width: 90%;
   }
   
 

  

</style>
