<x-app-layout>

  @include('components.toast')

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
                  aria-describedby="file_input_help" id="file_input" type="file" name="gambar"
                  value="{{ old('gambar') }}">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">only jpeg, png, jpg</p>
                @error('gambar')
                  <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>
              <div class="flex items-center mb-4">
                @foreach ($video as $video)
                <input type="checkbox" id="checkbox" name="id_menu"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="{{ $video->id_menu }}">
                {{ $video->nama }}
                @endforeach
              </div>
              <button type="submit" class="p-2 border">tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
