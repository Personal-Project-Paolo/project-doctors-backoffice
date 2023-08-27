<x-app-layout>
    @section('contents')
   
            <div class="dark:text-gray-100">
                <h2 class="mt-4 mb-4 text-2xl font-semibold leadi">Doctors</h2>

                <div>
                    <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                        <colgroup>
                            <col class="w-5">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col class="w-5">
                        </colgroup>
                        <thead>
                            <tr class="dark:bg-gray-700">
                                <th class="p-2">Id</th>
                                <th class="p-2">Mail</th>
                                <th class="p-2">Password</th>
                                <th class="p-2">Name</th>
                                <th class="p-2">Lastname</th>
                                <th class="p-2">Address</th>
                                <th class="p-2">Telephone</th>
                                <th class="p-2">Curriculum-Vitae</th>
                            </tr>
                        </thead>
                        <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-2 py-2">
                                        <p>{{ $user->id }}</p>
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $user->email }}</p>
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $user->password }}</p>
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $user->name }}</p>
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $user->lastname }}</p>
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $user->address }}</p>
                                    </td>
                                    <td class="px-2 py-2">
                                        <p>{{ $user->telephone }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{-- <div class="my-4">
                    {{ $users->links('vendor.pagination.tailwind') }}
                </div> --}}
            </div> 
    @endsection
</x-app-layout>