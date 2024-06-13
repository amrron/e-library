@extends('layouts.main')

@section('cdn')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection

@section('content')
    <div class="p-2 rounded-lg">
        <div class="flex justify-between flex-wrap gap-6 p-6 mb-2 bg-[#EAEAFF] text-[#171942] rounded-lg drop-shadow-lg">
            <div class="flex-grow">
                <h1 class="text-2xl font-bold">Daftar Peminjam Buku</h1>
                <p class="">Lihat seluruh peminjam buku perpustakaan</p>
            </div>
            <div class="">
                <button type="button"  data-modal-target="crud-modal" data-modal-toggle="crud-modal"  class="text-white bg-[#171942] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 ">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                    </svg>
                    Catat Peminjaman
                </button>
            </div>
        </div>
    </div>

    <!-- Masukin search bar -->

    <div class="relative overflow-x-auto rounded-lg shadow-md sm:rounded-lg mx-2 p-2">
        <table class="w-full p-2 text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Peminjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Peminjaman
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tenggat Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pengembalian
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr class="odd:bg-white even:bg-gray-50 ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        Thoriq Muhammad Pasya
                    </th>
                    <td class="px-6 py-4">
                        tmp010304@gmail.com
                    </td>
                    <td class="px-6 py-4">
                        23 Juni 2024
                    </td>
                    <td class="px-6 py-4">
                        23 Juni 2024
                    </td>
                    <td class="px-6 py-4">
                        23 Juni 2024
                    </td>
                    <td class="px-6 py-4">
                        Books of IOT
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-4 py-2 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Pengembalian</a>
                    </td>
                </tr> --}}
                @foreach ($peminjamans as $peminjam)
                <tr class="odd:bg-white even:bg-gray-50 ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $peminjam->user->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $peminjam->user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $peminjam->tanggal_peminjaman }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $peminjam->tenggat_pengembalian }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $peminjam->tanggal_pengembalian }}
                        <br>
                        {{ $peminjam->keterangan }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $peminjam->buku->judul }}
                    </td>
                    <td class="px-6 py-4">
                        @if (!$peminjam->isReturned)
                        <button type="button" data-id="{{ $peminjam->id }}" class="return-button focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-4 py-2 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" >Pengembalian</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('modal')
  
  <!-- Main modal -->
  <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                  <h3 class="text-lg font-semibold text-gray-900">
                      Tambah member baru
                  </h3>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <form class="p-4 md:p-5" action="/peminjaman" method="post">
                @csrf
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      {{-- <div class="col-span-2">
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                          <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan nama member" required="">
                      </div>
                      <div class="col-span-2">
                          <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                          <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Masukkan email member" required="">
                      </div> --}}
                      <div class="col-span-2">
                        <label for="tom-member" class="block mb-2 text-sm font-medium text-gray-900">Member</label>
                        <select id="tom-member" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->member_id }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-span-2">
                        <label for="tom-buku" class="block mb-2 text-sm font-medium text-gray-900">Buku</label>
                        <select id="tom-buku" name="buku_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->judul }} - {{ $book->author }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                      Tambah member baru
                  </button>
              </form>
          </div>
      </div>
  </div>   
@endsection

@section('script')
    <script>
        const tomSelectOptions = {
            create: true,
            sortField: {
                field: "text",
                direction: "asc"
            }
        };

        let tomMember = new TomSelect("#tom-member", tomSelectOptions)

        $('.return-button').on('click', function(){
            let id = $(this).data('id');
            
            Swal.fire({
                title: "Kembalikan buku?",
                // text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#171942",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, kembalikan buku"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/peminjaman/return/' + id,
                        type: 'PATCH',
                        contentType: false,
                        processData: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            console.log(response);

                            Swal.fire({
                                title: "Berhasil!",
                                text: "Buku berhasil dikembalikan.",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(error) {
                            console.error(error);
                        }
                    }); 
                
                }
            });
        })
    </script>
@endsection