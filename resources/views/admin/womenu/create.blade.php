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
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
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
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
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
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
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
            <form action="{{ route('latihan.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama</label>
                <input type="text" id="nama"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Push Up" name="nama" value="{{ old('nama') }}">
                @error('nama')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jenis</label>
                <input type="text" id="jenis"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="OtotDada" name="jenis" value="{{ old('jenis') }}">
                @error('jenis')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                  message</label>
                <textarea id="message" rows="4"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="deskripsi latihan..." name="deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                  file</label>
                <input
                  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                  aria-describedby="file_input_help" id="file_input" type="file" name="gambar" value="{{ old('gambar') }}">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">only jpeg, png, jpg</p>
                @error('gambar')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="p-2 border">tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
