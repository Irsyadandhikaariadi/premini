<x-app-layout>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h1 class="dark:text-white">Ubah detail latihan</h1>
          <form action="{{ route('latihan.update', $latihan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img src="{{ asset('storage/latihan/'.$latihan->gambar)}}" alt="">
            <div>
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama</label>
              <input type="text" id="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Push Up" name="nama" value="{{ $latihan->nama }}">
              @error('nama')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jenis</label>
              <input type="text" id="jenis"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="OtotDada" name="jenis" value="{{ $latihan->jenis }}">
              @error('jenis')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                message</label>
              <textarea id="message" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="deskripsi latihan..." name="deskripsi">{{ $latihan->deskripsi }}</textarea>
              @error('deskripsi')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                file</label>
              <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" type="file" name="gambar">
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">only jpeg, png, jpg</p>
              @error('gambar')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary dark:bg-gray-700 dark:text-white">Ubah</button>
            <a href="{{ route('latihan.admin') }}" class="btn btn-primary dark:bg-gray-700 dark:text-white">kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
