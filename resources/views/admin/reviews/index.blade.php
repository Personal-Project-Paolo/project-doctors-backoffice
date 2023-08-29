<x-app-layout>
    {{-- @section('contents')

    <div class="dark:text-gray-100">
        <h2 class="mt-4 mb-4 text-2xl font-semibold leadi">Recensioni</h2>

        <div>
            <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                <colgroup>
                    <col class="w-5">
                    <col>
                    <col class="w-5">
                </colgroup>
                <thead>
                    <tr class="dark:bg-gray-700">
                        <th class="p-2">Voto</th>
                        <th class="p-2">Nome</th>
                        <th class="p-2">Testo</th> 
                    </tr>
                </thead>
                <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                    @foreach ($reviews as $rewie)
                        <tr>
                            <td class="px-2 py-2">
                                <p>{{ $rewie->id }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $rewie->valutation }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $rewie->name }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $rewie->review }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection --}}

@section('title', 'Recensioni')

@section('content')

<div class="container">
        <div class="text-center text-review-index p-3">
            <h1>Le tue recensioni</h1>
        </div>
        @foreach ($reviews as $review)
        <div class="card mb-3 shadow-lg">
            <div class="card bg-review  p-3 text-start">
                <div class="text text-light my-4">
                    <h4 class="card-title fw-bold ">{{ $review->name }} {{ $review->surname }}</h4>
                    <p class="mb-3">Voto: {{ $review->vote }}</p>
                    <p>{{ $review->text }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

</x-app-layout>