@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-3">
        <div class="col-span-2">
            <div class="p-2 rounded-lg grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <div class="flex items-center">
                            <svg class="w-12 h-12 transition text-[#171942] duration-75 group-hover:text-900 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                            </svg>
                            <div class="flex-grow">
                                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Judul Buku</h3>
                                <span class="text-lg font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">{{ $total_judul }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <div class="flex items-center">
                            <svg class="w-12 h-12 transition text-[#374151] duration-75 group-hover:text-900 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                            </svg>
                            <div class="flex-grow">
                                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Salinan</h3>
                                <span class="text-lg font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">{{ $total_salinan }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-3 md:col-span-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <div class="w-full">
                        <div class="flex items-center">
                            <svg class="w-12 h-12 transition text-[#171942] duration-75 group-hover:text-900 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                            </svg>
                            <div class="flex-grow">
                                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Peminjaman</h3>
                                <span class="text-lg font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">{{ $total_peminjaman }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-2 rounded-lg">
                <div class="p-2 rounded-xl bg-white border shadow-lg">
                    <p class="text-xl mb-4 ms-2">Jumlah buku dipinjam dan dikembalikan</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-0 mx-2">
                        <div class="flex items-center rounded-lg h-24 p-2 mt-0">
                            <div class="mr-2">
                                <svg class="w-12 h-12 transition text-red-600 duration-75 group-hover:text-900 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-center">
                                    <p class="text-red-900">Buku dipinjam</p>
                                    <div class="flex">
                                        <div class="flex items-center">
                                            <p class="text-red-900 font-medium">{{ $buku_dipinjam }}</p>
                                            <p class="text-red-900"> /{{ $total_peminjaman }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-red-300 h-2.5 rounded-full" style="width: {{ $buku_dipinjam / $total_peminjaman * 100 }}%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center rounded-lg h-24 p-2 mt-0">
                            <div class="mr-2">
                                <svg class="w-12 h-12 transition text-green-600 duration-75 group-hover:text-900 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                    <path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
                                </svg>
                            </div>
                            <div class="flex-grow">
                                <div class="flex justify-between items-center">
                                    <p class="text-green-900">Buku dikembalikan</p>
                                    <div class="flex">
                                        <div class="flex items-center">
                                            <p class="text-green-900 font-medium">{{ $buku_dikembalikan }}</p>
                                            <p class="text-green-900">/{{ $total_peminjaman }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-300 h-2.5 rounded-full" style="width: {{ $buku_dikembalikan / $total_peminjaman * 100 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="grid grid-cols-1 mt-0 mb-2">
                        <h1 class="text-lg font-medium ms-2 mt-3">Riwayat peminjaman Buku</h1>
                        <div class="flex p-2">
                            <a href="" class="text-sm font-regular text-gray-900 mr-4">Dipinjam</a>
                            <a href="" class="text-sm font-regular text-gray-600 mr-4 hover:text-gray-900">Dikembalikan</a>
                        </div>
                    </div> --}}
                </div>
            </div>

            <!-- Masukin search bar -->

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-2 drop-shadow-lg p-2 bg-white">
                <table class="w-full p-2 text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-white">
                        <tr>
                            <th scope="col" class="px-2 py-2">
                                Nama Peminjam
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Email
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Tenggat Pengembalian
                            </th>
                            <th scope="col" class="px-2 py-2">
                                Judul Buku
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjamans as $peminjaman)
                        <tr class="odd:bg-white even:bg-gray-50 ">
                            <th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $peminjaman->user->name }}
                            </th>
                            <td class="px-2 py-4">
                                {{ $peminjaman->user->email }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $peminjaman->tenggat_pengembalian }}
                            </td>
                            <td class="px-2 py-4">
                                {{ $peminjaman->buku->judul }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-span-1 p-2">
            <div class="w-full p-4 rounded-lg shadow-sm border">
                <h1 class="text-xl text-[#171942] font-bold mb-4">Buku Terfavorit</h1>
                <div class="w-full space-y-4">
                    @foreach ($buku_terfavorit as $buku)
                    <div class="w-full flex gap-2">
                        <div class="">
                            <img src="{{ $buku->cover }}" class="h-40 w-28 object-cover rounded-lg" alt="">
                        </div>
                        <div class="flex-grow">
                            <h1 class="text-md font-semibold">{{ $buku->judul }}</h1>
                            <p class="">{{ $buku->author }}</p>
                            <p class="">Dipinjam {{ $buku->jumlah_peminjaman }} kali</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
