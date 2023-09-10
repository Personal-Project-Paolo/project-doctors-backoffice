<x-app-layout>

@section('contents')

    @if(session('delete_success'))
        <div class="bg-green-500 text-white px-4 py-2 mt-4 rounded">
            {{ session('delete_success') }}
        </div>
    @endif

    <!-- Modale di conferma per eliminazione definitiva -->
    <div id="deleteConfirmationModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="modal-container bg-white dark:bg-gray-900 dark:text-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Contenuto del modale -->
            <div class="modal-content py-4 text-left px-6">
                <div class="modal-header">
                    <h2 class="text-xl font-semibold">Conferma eliminazione definitiva</h2>
                </div>
                <div class="modal-body mt-3">
                    <p>Sei sicuro di voler eliminare definitivamente questo messaggio?</p>
                </div>
                <div class="modal-footer mt-4">
                    <button onclick="closeDeleteConfirmationModal()" class="text-gray-500 hover:text-gray-700 px-4 py-2 mr-2 focus:outline-none">Annulla</button>
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-red active:bg-red-700">Elimina definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg">
        <div class="dark:text-gray-100 contain ">
            <h2 class="mt-4 mb-4 text-2xl font-semibold leadi">Messaggi</h2>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Data e Ora
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Testo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            @foreach ($messages as $message)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <p>{{ $message->created_at }}</p>
                                                
                                            </td>
                                            <td class="px-6 py-4">
                                                <p>{{ $message->email }}</p>
                                                
                                            </td>
                                            <td class="px-6 py-4">
                                                <p>{{ $message->text }}</p>
                                            </td>
                                            <td class="px-6 py-4">
                                                <form action="{{ route('admin.messages.trashed.hard-delete', ['id' => $message->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-red active:bg-red-700">
                                                        Elimina definitivamente
                                                    </button>
                                                </form>
                                            </td>
                                            
                                        </tr>
                            @endforeach
                        </tr>   
                    </tbody>
                </table>
            </div>      
        </div>
        <div>
            <x-nav-link :href="route('admin.messages.index')" :active="request()->routeIs('messages')">
                <button type="button" class=" px-8 py-3 font-semibold my-btn ">
                    <span >{{ __('Ritorna ai messaggi') }} </span>
                </button>
            </x-nav-link>
        </div>
    </div>

    
@endsection
</x-app-layout>

<style>

    .bg{
        width: 100%;
        background-image: url('https://us.123rf.com/450wm/wstockstudio/wstockstudio1707/wstockstudio170700042/81669810-stetoscopio-isolato-su-sfondo-nero-scrivania-di-medici-sterili-accessori-medici-sullo-sfondo-nero.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;
        padding-top: 4.5rem;
        text-align: center;
    }
    .contain{
        width: 70%;
        background-color: white;
        margin: auto;
        padding: 1rem;
        border-radius: 1rem;
    }

    h2{
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

</style>