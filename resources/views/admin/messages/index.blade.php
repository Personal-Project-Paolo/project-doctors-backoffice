<x-app-layout>

    
    @section('contents')
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
                                <th scope="col" class="px-6 py-3">
                                    Azioni
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
                                                <td>
                                                    <form
                                                        action=""
                                                        data-template="{{ route('admin.messages.trashed', ['doctor' => '*****'], ['messages'=> $message->id]) }}"
                                                        method="POST"
                                                        class="d-inline-block"
                                                        id="confirm-delete"
                                                        >
                                                        @csrf
                                                        @method('delete')
                                                            <button class=" px-8 py-3 font-semibold my-second-btn">Elimina</button>
                                                    </form>
                                                </td>
                                            </tr>
                                @endforeach
                            </tr>   
                        </tbody>
                    </table>
                </div>      
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
</style>



