<x-app-layout>

  @include('components.toast')

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form action="{{ route('womenu.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama</label>
                <input type="text" id="nama"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama workout" name="nama" value="{{ old('nama') }}">
                @error('nama')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                  file</label>
                <input
                  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                  aria-describedby="file_input_help" id="file_input" type="file" name="video_url" value="{{ old('video_url') }}">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">video</p>
                @error('video_url')
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
