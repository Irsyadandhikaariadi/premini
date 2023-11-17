<x-app-layout>

    <script>
        // Set timeout 5 seconds to hide toast notification
        setTimeout(() => {
            document.getElementById('toast-success').style.display = 'none';
        }, 5000);
        setTimeout(() => {
            document.getElementById('toast-warning').style.display = 'none';
        }, 5000);
        setTimeout(() => {
            document.getElementById('toast-danger').style.display = 'none';
        }, 5000);
    </script>

    <style>
        @keyframes progress-bar {
            0% {
                width: 100%;
            }

            100% {
                width: 0%;
            }
        }
    </style>

    @if (session('success'))
        <div id="toast-success"
            class="absolute top-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
            <div class="w-full h-1 bg-green-100 rounded-b-lg absolute bottom-0 left-0"
                style="width: 100%; animation: progress-bar 5s linear;"></div>
        </div>
    @endif
    @if (session('info'))
        <div id="toast-warning"
            class="absolute top-4 right-4 flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                </svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('info') }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
            <div class="w-full h-1 bg-green-100 rounded-b-lg absolute bottom-0 left-0"
                style="width: 100%; animation: progress-bar 5s linear;"></div>
        </div>
    @endif
    @if (session('danger'))
        <div id="toast-danger"
            class="absolute top-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Item has been deleted.</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
            <div class="w-full h-1 bg-green-100 rounded-b-lg absolute bottom-0 left-0"
                style="width: 100%; animation: progress-bar 5s linear;"></div>
        </div>
    @endif

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
                                            class="block border border-blue-600 bg-blue-600 rounded-lg font-normal text-sm text-white px-2 py-1 me-4 hover:bg-blue-800 shadow-lg">Ubah</a>
                                        <a href="anggota/delete/{{ $user->id }}"
                                            onclick="return confirm('yakin mau menghapus data ini?')"
                                            class="block border border-red-600 bg-red-600 rounded-lg font-normal text-sm text-white px-2 py-1 hover:bg-red-800 shadow-lg">Hapus</a>
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
