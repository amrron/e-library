<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Library</title>
    <!-- Vite -->
    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

	<!-- CDN -->
	@yield('cdn')
</head>
<body>
    
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
	<span class="sr-only">Open sidebar</span>
	<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
		<path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
	</svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
	<div class="h-full px-3 py-4 overflow-y-auto bg-gray-200">
		<a href="/" class="flex items-center ps-2.5 mb-9">
			<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M24 48C37.2548 48 48 37.2548 48 24C48 10.7452 37.2548 0 24 0C10.7452 0 0 10.7452 0 24C0 37.2548 10.7452 48 24 48ZM24.0001 11.6568C23.2031 11.6568 22.4161 11.834 21.6961 12.1755L8.32738 18.5088C8.08177 18.6247 7.87611 18.8109 7.73645 19.0438C7.5968 19.2767 7.52944 19.5459 7.54292 19.8171V28.1142C7.54292 28.478 7.68741 28.8268 7.9446 29.084C8.2018 29.3412 8.55062 29.4857 8.91435 29.4857C9.27808 29.4857 9.6269 29.3412 9.8841 29.084C10.1413 28.8268 10.2858 28.478 10.2858 28.1142V21.9593L21.6083 27.5766C22.3515 27.9459 23.1702 28.138 24.0001 28.138C24.83 28.138 25.6486 27.9459 26.3918 27.5766L39.6947 20.9773C39.9256 20.863 40.1196 20.6859 40.2545 20.4664C40.3894 20.2469 40.4597 19.9938 40.4574 19.7362C40.4551 19.4785 40.3803 19.2267 40.2415 19.0097C40.1028 18.7926 39.9056 18.619 39.6727 18.5088L26.3041 12.1755C25.584 11.834 24.797 11.6568 24.0001 11.6568ZM13.0286 30.8571V26.3835L20.3905 30.0342C21.5123 30.5911 22.7477 30.8808 24.0001 30.8808C25.2525 30.8808 26.4879 30.5911 27.6097 30.0342L34.9715 26.3808V30.8571C34.9718 31.0373 34.9366 31.2158 34.8679 31.3824C34.7992 31.549 34.6983 31.7005 34.571 31.8281L34.5655 31.8308L34.5628 31.8336L34.5463 31.85L34.5025 31.8939L34.3379 32.0475C33.4787 32.8141 32.5494 33.4983 31.5621 34.0909C29.7271 35.1908 27.0803 36.3428 24.0001 36.3428C20.9198 36.3428 18.2757 35.1908 16.438 34.0909C15.5137 33.5341 14.7731 32.9801 14.2602 32.5604C14.0005 32.3465 13.8021 32.1755 13.665 32.0475L13.5004 31.8939L13.4373 31.8363L13.4318 31.8281C13.3041 31.7007 13.2027 31.5494 13.1335 31.3828C13.0643 31.2161 13.0287 31.0375 13.0286 30.8571Z" fill="#292B67"/>
			</svg>
			
			<span class="self-center text-2xl font-semibold whitespace-nowrap ">E-Library</span>
		</a>
		<ul class="space-y-2 font-medium">
			<li>
				<a href="/" class="flex items-center p-2 {{ request()->routeIs('dashboard') ? "bg-gray-700 text-white" : "text-gray-900" }} rounded-lg hover:bg-gray-700 hover:text-white">
				<svg class="w-5 h-5 transition duration-75 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
					<path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
					<path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
					</svg>
				<span class="ms-3">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="/buku" class="flex items-center p-2 {{ request()->routeIs('buku') ? "bg-gray-700 text-white" : "text-gray-900" }} rounded-lg hover:bg-gray-700 hover:text-white">
				<svg class="w-5 h-5 transition duration-75  group-hover:text-gray-900   " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
					<path d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z"/>
				</svg>
				<span class="ms-3">Daftar Buku</span>
				</a>
			</li>
			<li>
				<a href="/member" class="flex items-center p-2 {{ request()->routeIs('member') ? "bg-gray-700 text-white" : "text-gray-900" }} rounded-lg hover:bg-gray-700 hover:text-white">
				<svg class="w-5 h-5 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
					<path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
				</svg>
				<span class="ms-3">Daftar Anggota</span>
				</a>

			</li>
			<li>
				<a href="/peminjaman" class="flex items-center p-2 {{ request()->routeIs('peminjaman') ? "bg-gray-700 text-white" : "text-gray-900" }} rounded-lg hover:bg-gray-700 hover:text-white">
				<svg class="w-5 h-5 transition duration-75  group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
					<path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
				</svg>					  
				<span class="ms-3">Peminjaman</span>
				</a>
			</li>
		</ul>
	</div>
</aside>
 
<div class="p-2 sm:ml-64">

@yield('content')

</div>

@yield('modal')

@yield('script')


</body>
</html>