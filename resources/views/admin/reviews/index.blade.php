<x-app-layout>
    @section('contents')

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
                    @foreach ($reviews as $review)
                        <tr>
                            <td class="px-2 py-2">
                                <p>{{ $review->id }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $review->valutation }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $review->name }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $review->review }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
</x-app-layout>