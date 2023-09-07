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
                                                            <p>{{ $message->email }}</p>
                                                            
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <p>{{ $message->text }}</p>
                                                        </td>
                                                    </tr>
                                        @endforeach
                                    </tr>   
                                </tbody>
                            </table>
                        </div>
                            {{-- <div >
                                <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                                    <colgroup>
                                        <col class="w-5">
                                        <col>
                                        <col class="w-5">
                                    </colgroup>
                                    <thead>
                                        <tr class="dark:bg-gray-700">
                                            <th class="p-2">Email</th>
                                            <th class="p-2">Testo</th> 
                                        </tr>
                                    </thead>
                                    <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                                        @foreach ($messages as $message)
                                            <tr>
                                            
                                                <td class="px-2 py-2">
                                                    <p>{{ $message->email }}</p>
                                                    
                                                </td>
                                                <td class="px-2 py-2">
                                                    <p>{{ $message->text }}</p>
                                                </td>
                                            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> --}}
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



