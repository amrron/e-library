@extends('layouts.main')

@section('content')
    <div class="flex justify-between flex-wrap gap-6 p-6 mb-4 bg-[#EAEAFF] text-[#171942] rounded-lg">
        <div class="flex-grow">
            <h1 class="text-2xl font-bold">Daftar Buku</h1>
            <p class="">Lihat koleksi buku di perpustakaan</p>
        </div>
        <div class="">
            <button type="button"  data-modal-target="crud-modal" data-modal-toggle="crud-modal"  class="text-white bg-[#171942] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium   rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 ">
                <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
                Tambah Buku
            </button>
        </div>
    </div>

    @if (session('status'))
    <div id="toast-success" class="fixed z-50 top-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">Buku berhasil ditambahkan.</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
    @if (!$errors->isEmpty())
    <div id="toast-danger" class="fixed z-50 top-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow " role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">Gagal menambahkan buku.</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " data-dismiss-target="#toast-danger" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif

    <form class="mx-auto mb-4" method="get">
        <div class="flex">
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Your Email</label>
            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 " type="button">{{ $kategoris->where('id', request('kategori'))->first()->nama ?? 'Semua kategori' }} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdown" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    <li>
                        <button type="button" class="kategori inline-flex w-full px-4 py-2 hover:bg-gray-100" data-id=""="">Semua</button>
                    </li>
                    @foreach ($kategoris as $kategori)
                    <li>
                        <button type="button" class="kategori inline-flex w-full px-4 py-2 hover:bg-gray-100" data-id="{{ $kategori->id }}"="">{{ $kategori->nama }}</button>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="relative w-full">
                <input type="search" id="search-dropdown" name="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="{{ request('search') }}" placeholder="Cari nama buku ..."/>
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 min-h-48 mb-4 rounded">
        
        @foreach ($bukus as $buku)
        <a href="#" class="w-full p-4 flex gap-4 flex-col items-center bg-white border border-gray-200 rounded-lg shadow lg:flex-row hover:bg-gray-100 ">
            <img class="object-cover w-full rounded-lg h-96 md:h-auto md:w-48" src="{{ $buku->cover }}" alt="">
            <div class="flex flex-col flex-grow justify-between leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $buku->judul }}</h5>
                <div class="flex justify-between flex-wrap">
                    <div class="space-y-4">
                        <div class="">
                            <p class="font-normal text-gray-700">Penerbit</p>
                            <p class="mb-3 font-normal text-gray-700">{{ $buku->penerbit }}</p>
                        </div>
                        <div class="">
                            <p class="font-normal text-gray-700">Tahun Terbit</p>
                            <p class="mb-3 font-normal text-gray-700">{{ $buku->tahun_terbit }}</p>
                        </div>
                        <div class="">
                            <p class="font-normal text-gray-700">ISBN</p>
                            <p class="mb-3 font-normal text-gray-700">{{ $buku->isbn }}</p>
                        </div>
                    </div>
                    <div class="w-full flex justify-end items-end">
                        <div class="">
                            <span class="text-gray-400 me-2">Stok buku: {{ $buku->stok }}</span>
                            <button type="button"  data-modal-target="edit-modal" data-modal-toggle="edit-modal" data-id="{{ $buku->id }}" class="edit-book text-white bg-[#171942] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center ">
                                Edit Buku
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="flex items-center justify-center rounded bg-gray-50 h-28">
            <p class="text-2xl text-gray-400">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28">
            <p class="text-2xl text-gray-400">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28">
            <p class="text-2xl text-gray-400">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            </p>
        </div>
        <div class="flex items-center justify-center rounded bg-gray-50 h-28">
            <p class="text-2xl text-gray-400">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
            </p>
        </div>
    </div>
@endsection

@section('modal')
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Tambah Buku Baru
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="POST" action="/buku" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Cover Buku</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="cover" name="cover" type="file">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Judul Buku</label>
                            <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan judul buku" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                            <input type="text" name="author" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan penulis buku" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan penerbit buku" required="">
                        </div>
                        <div class="col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" min="1900" max="2024" value="2024" placeholder="Masukan tahun terbit" required="">
                        </div>
                        <div class="col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                            <select type="number" name="kategori_id" id="kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" min="1900" max="2024" value="2024" placeholder="Masukan tahun terbit" required="">
                                @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Salinan</label>
                            <input type="number" name="jumlah_salinan" id="jumlah_salinan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" min="1" value="1" placeholder="Masukan jumlah salinan" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan ISBN" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Tambah buku baru    
                    </button>
                </form>
            </div>
        </div>
    </div> 

    <div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Ubah Baru
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="edit-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" method="POST" action="/buku" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Cover Buku</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="edit_cover" name="cover" type="file">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Judul Buku</label>
                            <input type="text" name="judul" id="edit_judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan judul buku" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Penulis</label>
                            <input type="text" name="author" id="edit_author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukan penulis buku" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Penerbit</label>
                            <input type="text" name="penerbit" id="edit_penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan penerbit buku" required="">
                        </div>
                        <div class="col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" id="edit_tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" min="1900" max="2024" value="2024" placeholder="Masukan tahun terbit" required="">
                        </div>
                        <div class="col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                            <select type="number" name="kategori_id" id="edit_kategori_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" min="1900" max="2024" value="2024" placeholder="Masukan tahun terbit" required="">
                                @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Salinan</label>
                            <input type="number" name="jumlah_salinan" id="edit_jumlah_salinan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" min="1" value="1" placeholder="Masukan jumlah salinan" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">ISBN</label>
                            <input type="text" name="isbn" id="edit_isbn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-50 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Masukkan ISBN" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Ubah data buku    
                    </button>
                </form>
            </div>
        </div>
    </div> 
@endsection

@section('script')
    <script>
        $('.kategori').on('click', function(){
            let kategori = $(this).data('id');

            var currentUrl = new URL(window.location.href);
            kategori == "" ? currentUrl.searchParams.delete('kategori') : currentUrl.searchParams.set('kategori', kategori);
            window.location.href = currentUrl.toString();
        });

        $('.edit-book').off('click').on('click', function(){
            let id = $(this).data('id');

            $.ajax({
                url: '/buku/' + id,
                type: 'GET',
                success: function(response){
                    $('#edit-modal').removeClass('hidden');
                    $('#edit-modal').find('form').attr('action', '/buku/' + id);
                    $('#edit-modal').find('#edit_judul').val(response.data.judul);
                    $('#edit-modal').find('#edit_author').val(response.data.author);
                    $('#edit-modal').find('#edit_penerbit').val(response.data.penerbit);
                    $('#edit-modal').find('#edit_tahun_terbit').val(response.data.tahun_terbit);
                    $('#edit-modal').find('#edit_kategori_id').val(response.data.kategori_id);
                    $('#edit-modal').find('#edit_jumlah_salinan').val(response.data.jumlah_salinan);
                    $('#edit-modal').find('#edit_isbn').val(response.data.isbn);
                }
            });
        });

        // $('#edit-modal').find('form').on('submit', function(e){
        //     e.preventDefault();

        //     let data = new FormData(this);

        //     $.ajax({
        //         url: $(this).attr('action'),
        //         type: 'POST',
        //         data: data,
        //         processData: false,
        //         contentType: false,
        //         success: function(response) {
        //             console.log(response);
        //         },
        //         error: function(error) {
        //             console.error(error);
        //         }
        //     });
        // });
    </script>
@endsection