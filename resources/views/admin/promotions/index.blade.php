<x-app-layout>

    @section('title', 'Sponsorizzazioni')
    @section('contents')
        <section class="sponsor">
            <div class="container py-5">

                @if (session('message'))
                    <div class="alert alert-{{ session('alert-type') }}">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="row mb-5 justify-content-center">
                    <div class="col-7">
                        <h2 class="text-center mb-4">Acquista un sponsorizzazione!</h2>
                        <h5 class="text-center">Selezionando uno dei nostri pacchetti sponsor, il tuo profilo verrà pubblicato
                            nella nostra homepage per la durata indicata</h5>
                    </div>
                </div>

                {{-- <div class="row justify-content-around">
                    @foreach ($promotions as $promotion)
                        <div class="card pb-3 col-12 col-md-3 mb-4 text-center">
                            <h4 class="text-uppercase py-3 type-sponsor text-white">{{ $promotion->specifics }}</h4>
                            <div>
                                <h5 class="card-title pt-3">Durata: {{ $promotion->duration }} ore</h5>
                                <h1 class="card-text py-4">{{ $promotion->price }} &euro;</h1>
                                <a class="my-btn" href=" {{ route('admin.promotions.show', $promotion->id) }}">Acquista</a>
                            </div>
                        </div>
                    @endforeach
                </div> --}}

                <div>
                    <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                        <colgroup>
                            <col class="w-5">
                            <col>
                            <col class="w-5">
                        </colgroup>
                        <thead>
                            <tr class="dark:bg-gray-700">
                                <th class="p-2">Nome</th>
                                <th class="p-2">Descrizione</th> 
                                <th class="p-2">Durata</th> 
                                <th class="p-2">Prezzo</th> 
                            </tr>
                        </thead>
                        <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                            @foreach ($promotions as $promotion)
                                <tr>
                                   
                                    <td class="px-2 py-2">
                                        <p>{{ $promotion->name }}</p>
                                        
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $promotion->description }}</p>
                                    </td>
                                   
                                    <td class="px-2 py-2">
                                        <p>{{ $promotion->time }}</p>
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $promotion->price }}</p>
                                    </td>
                                   <td class="px-2 py-2">>
                                    <a class="my-btn" href=" {{ route('admin.promotions.show', $promotion->id) }}">Acquista</a>
                                   </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
@endsection
    
</x-app-layout>