<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg relative">
                <div class="p-6 text-gray-100">
                    <p class="ms-3 mb-2 text-lg font-semibold">Informasi</p>
                    {{-- card dalam --}}
                    <div class="bg-gray-600 rounded-lg max-w-6xl py-3 px-3 relative">
                        <h1 class="text-lg font-medium ms-3">Statistik</h1>
                        {{-- statistik --}}
                        <div class="flex justify-center mx-12 flex-wrap">
                            {{-- anggota --}}
                            <div class="bg-gray-700 rounded-lg max-w-2xl w-56 py-3 my-3 ms-2">
                                <img class="w-48 h-32 mx-auto rounded-lg" src="../img/anggota.jpg" alt="">
                                <div class="flex justify-center my-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                                    </svg>

                                    <p class="text-white-font-medium text-lg mx-3">80 Anggota</p>
                                </div>
                            </div>
                            {{-- akhir anggota --}}
                            {{-- latihan --}}
                            <div class="bg-gray-700 rounded-lg max-w-2xl w-56 py-3 my-3 ms-2">
                                <img class="w-48 h-32 mx-auto rounded-lg" src="../img/latihan.jpg" alt="">
                                <div class="flex justify-center my-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            d="M5.566 4.657A4.505 4.505 0 016.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0015.75 3h-7.5a3 3 0 00-2.684 1.657zM2.25 12a3 3 0 013-3h13.5a3 3 0 013 3v6a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-6zM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 016.75 6h10.5a3 3 0 012.683 1.657A4.505 4.505 0 0018.75 7.5H5.25z" />
                                    </svg>
                                    <p class="text-white-font-medium text-lg mx-3">80 Pelatihan</p>
                                </div>
                            </div>
                            {{-- akhir latihan --}}
                            {{-- menuwo --}}
                            <div class="bg-gray-700 rounded-lg max-w-2xl w-56 py-3 my-3 ms-2">
                                <img class="w-48 h-32 mx-auto rounded-lg" src="../img/wo.jpg" alt="">
                                <div class="flex justify-center my-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-white-font-medium text-lg mx-3">24 WoMenu</p>
                                </div>
                            </div>
                            {{-- akhir menuwo --}}
                        </div>
                        {{-- akhir statistik --}}
                    </div>
                    {{-- akhir card dalam --}}
                    {{-- card dalam motivasi --}}
                    <div class="bg-gray-600 rounded-lg max-w-6xl py-3 px-3 my-5 relative">
                        <h1 class="text-lg font-medium ms-3">Motivasi</h1>
                        {{-- motivasi --}}
                        <div class="flex justify-between mx-12">
                            
                            
                        </div>
                        {{-- akhir motivasi --}}
                    </div>
                    {{-- akhir card dalam motivasi --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
