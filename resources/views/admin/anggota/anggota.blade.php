<x-app-layout>

    @include('components.toast')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                      <p class="text-medium text-white font-semibold text-lg ms-3">Anggota</p>
                        <div class="flex justify-center flex-wrap px-2 py-2">
                            @foreach ($user as $user)
                                <div
                                    class="block border border-gray-600 bg-slate-600 font-medium rounded-lg mx-4 my-4 px-4 py-4 max-w-md">
                                    {{-- tempat image --}}
                                    <div class="flex justify-center">
                                        <img class="w-20 h-20 rounded-full" src="../img/cek.jpeg" alt="Large avatar">
                                    </div>
                                    {{-- nama --}}
                                    <p class="text-xl text-white text-center mt-2">{{ $user->name }}</p>
                                    {{-- gmail --}}
                                    <p class="text-sm text-white text-center">{{ $user->email }}</p>
                                    {{-- tombol --}}
                                    <div class="flex justify-between mx-3 mt-4">
                                        <a href="anggota/edit/{{ $user->id }}"
                                            class="block border border-blue-600 bg-blue-600 rounded-lg font-normal text-sm text-white px-2 py-1 me-4 hover:bg-blue-800 shadow-lg hover:border-blue-800">Ubah</a>
                                        <a href="anggota/delete/{{ $user->id }}"
                                            onclick="return confirm('yakin mau menghapus data ini?')"
                                            class="block border border-red-600 bg-red-600 rounded-lg font-normal text-sm text-white px-2 py-1 hover:bg-red-800 shadow-lg hover:border-red-800">Hapus</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
