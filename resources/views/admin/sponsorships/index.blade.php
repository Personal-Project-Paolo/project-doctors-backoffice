<x-app-layout>

    @section('title', 'Sponsorizzazioni')
    @section('content')
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

                <div class="row justify-content-around">
                    @foreach ($sponsorships as $sponsorship)
                        <div class="card pb-3 col-12 col-md-3 mb-4 text-center">
                            <h4 class="text-uppercase py-3 type-sponsor text-white">{{ $sponsorship->specifics }}</h4>
                            <div>
                                <h5 class="card-title pt-3">Durata: {{ $sponsorship->duration }} ore</h5>
                                <h1 class="card-text py-4">{{ $sponsorship->price }} &euro;</h1>
                                <a class="my-btn" href=" {{ route('admin.sponsorships.show', $sponsorship->id) }}">Acquista</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
@endsection
    
</x-app-layout>