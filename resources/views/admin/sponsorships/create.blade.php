<x-app-layout>
    @section('content')
        <div class="container">
            @include('admin.sponsorships.partials.create_edit', [
                'method' => 'POST',
                'route' => 'admin.sponsorships.store',
            ])
        </div>
    @endsection
</x-app-layout>