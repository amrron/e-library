@extends('layouts.main')

@section('content')
    <div class="p-2 rounded-lg">
       <div class="p-2 rounded-xl bg-white my-2 drop-shadow-lg">

        <h1 class="text-2xl font-medium ms-2 mt-3">Admin</h1>
        <p class="text-xl mt-0 ms-2 mb-4">Kelola peminjaman buku dengan mudah</p>

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
                                <p class="text-red-900 font-medium">08</p>
                                <p class="text-red-900">/10</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-red-300 h-2.5 rounded-full" style="width: 45%"></div>
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
                                <p class="text-green-900 font-medium">08</p>
                                <p class="text-green-900">/10</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-300 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </div>
         </div>
         <div class="grid grid-cols-1 mt-0 mb-2">
            <h1 class="text-lg font-medium ms-2 mt-3">Riwayat peminjaman Buku</h1>
            <div class="flex p-2">
                <a href="" class="text-sm font-regular text-gray-900 mr-4">Dipinjam</a>
                <a href="" class="text-sm font-regular text-gray-600 mr-4 hover:text-gray-900">Dikembalikan</a>
            </div>
        </div>

       </div>
    </div>
   
    <!-- Masukin search bar -->

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-2 drop-shadow-lg">
   


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
            <tr class="odd:bg-white even:bg-gray-50 ">
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
                    Books of IOT
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-4 py-2 me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Pengembalian</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection