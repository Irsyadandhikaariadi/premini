<x-app-layout>
  <div class="py-10">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <a href="{{ route('jadwal.create') }}" class="underline">Tambah</a>
                  @foreach ($jadwal as $event)
                      <a href="#"
                          class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                              {{ $event->note }}
                          </h5>
                          <p class="font-normal text-gray-700 dark:text-gray-400">{{ $event->waktu }}</p>
                      </a>
                  @endforeach
                  <div class="grid grid-flow-col gap-4">
                      {{-- kalender kiri --}}
                      <div class="col-span-1">
                          <div class="w-full max-w-sm mx-auto">
                              <div class="flex items-center justify-between border rounded p-2">
                                  <h2 id="currentMonth" class="text-lg font-medium"></h2>
                                  <div class="flex items-center">
                                      <button id="prevBtn" class="prev-btn me-4">Prev</button>
                                      <button id="nextBtn" class="next-btn">Next</button>
                                  </div>
                              </div>

                              <div class="grid grid-cols-7 gap-1 border-b p-2">
                                  @php
                                      $currentMonth = 11; // November
                                      $currentYear = 2023;
                                      $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
                                      $firstDay = date('w', strtotime('1-' . $currentMonth . '-' . $currentYear));
                                      $dayCount = 0;
                                  @endphp

                                  <div class="w-full grid grid-cols-7 gap-1 border-b p-2">
                                      @for ($i = 0; $i < $daysInMonth + $firstDay; $i++)
                                          @if ($i < $firstDay)
                                              <div class="p-2"></div>
                                          @else
                                              @php
                                                  $dayCount++;
                                                  $currentDate = \Carbon\Carbon::create($currentYear, $currentMonth, $dayCount)->format('d-m-Y');
                                              @endphp
                                              <div class="p-2 text-center">
                                                  <a href="{{ url('event/' . $currentDate) }}">{{ $dayCount }}</a>
                                              </div>
                                          @endif
                                      @endfor
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-span-3"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
      $(document).ready(function() {
          var currentMonth = 11; // November
          var currentYear = 2023;

          $("#prevBtn").on("click", function() {
              currentMonth--;
              if (currentMonth < 1) {
                  currentMonth = 12;
                  currentYear--;
              }
              updateCalendar();
          });

          $("#nextBtn").on("click", function() {
              currentMonth++;
              if (currentMonth > 12) {
                  currentMonth = 1;
                  currentYear++;
              }
              updateCalendar();
          });

          function updateCalendar() {
              $("#currentMonth").text(getMonthName(currentMonth) + " " + currentYear);
              // Add logic to update the calendar based on the new month and year.
              // You may need to make an AJAX request to the server to get new data.
              // For simplicity, I'm leaving this part to be implemented based on your needs.
          }

          function getMonthName(month) {
              var months = [
                  "January", "February", "March", "April",
                  "May", "June", "July", "August",
                  "September", "October", "November", "December"
              ];
              return months[month - 1];
          }
      });
  </script>

</x-app-layout>
