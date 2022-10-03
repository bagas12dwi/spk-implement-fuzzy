<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cek Kos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
</head>

<body>
    <section class="h-full w-full border-box  transition-all duration-500 linear bg-white">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .btn-outline-header-2-2 {
                border: 1px solid #555B61;
                color: #555B61;
            }

            .btn-outline-header-2-2:hover {
                border: 1px solid #27C499;
                color: #27C499;
            }

            .btn-outline-header-2-2:hover div path {
                fill: #27C499;
            }

            .btn-fill-header-2-2 {
                border: 1px solid #27C499;
            }

            .navigation-header-2-2 a:hover,
            .active::after {
                font-weight: 600;
            }
        </style>
        <!-- Navbar -->
        <div style="font-family: 'Poppins', sans-serif;">
            <header x-data="{ open: false }">
                <div
                    class="mx-auto flex py-12 lg:px-24 md:px-16 sm:px-8 px-8  items-center justify-between lg:justify-start">
                    <a href="#">
                        <img src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png"
                            alt="">
                    </a>
                    <div class="flex mr-0 lg:hidden cursor-pointer">
                        <svg class="w-6 h-6" @click="open = !open" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </div>
                    <div :class="{ 'hidden': !open }"
                        class="bg-black fixed w-full hidden h-full top-0 left-0 z-30 bg-opacity-60"
                        @click="open = !open">
                    </div>
                    <nav class="navigation-header-2-2 lg:mr-auto hidden lg:flex flex-col text-base justify-center z-50 fixed top-8 left-3 right-3 p-8 rounded-md shadow-md bg-white lg:flex lg:flex-row lg:relative lg:top-0 lg:shadow-none lg:bg-transparent lg:p-0 lg:items-center items-start"
                        :class="{ 'flex': open, 'hidden': !open }">
                        <a href="#">
                            <img class="m-0 lg:hidden mb-3"
                                src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-5.png"
                                alt="">
                        </a>
                        <a class=" text-lg font-semibold leading-6 mx-0 lg:mx-5 my-4 lg:my-0 relative active"
                            style="color: #1d1e3c; font-family: 'Poppins', sans-serif;" href="#">Home</a>
                        <div class="flex items-center justify-end w-full lg:hidden mt-3">
                            <button
                                class=" text-white  text-lg py-3 px-8 rounded-xl focus:outline-none hover:shadow-lg  font-semibold"
                                style="background: #27C499; font-family: 'Poppins', sans-serif;">
                                Get Started
                            </button>
                        </div>
                        <svg @click="open = !open" class="w-6 h-6 absolute top-4 right-4  lg:hidden cursor-pointer"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </nav>
                </div>
            </header>
        </div>
    </section>
    <section class="h-full lg:px-24 md:px-16 sm:px-8 px-4 bg-white">
        <form class="w-full" method="POST" action="{{ route('check_price') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-first-name">
                        Your Name
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" name="name" placeholder="Name"
                        value="{{ $data_form != null ? $data_form['name'] : '' }}">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-last-name">
                        Your Address
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-last-name" type="text" name="address" placeholder="Address"
                        value="{{ $data_form != null ? $data_form['address'] : '' }}">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/6 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Luas Kost
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="number" name="luas" placeholder="2 - 10"
                        value="{{ $data_form != null ? $data_form['luas'] : '' }}">
                    <p class="text-gray-600 text-xs italic">Dalam satuan meter persegi</p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Fasilitas
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[0]" value="10"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][0]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Tempat Tidur</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[1]" value="20"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][1]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Almari</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[2]" value="15"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][2]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Meja</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[3]" value="60"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][3]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Kamar Mandi Dalam</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[4]" value="50"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][4]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Dapur</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[5]" value="35"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][5]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Wi-Fi</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[6]" value="40"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][6]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">AC</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[7]" value="30"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][7]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">TV</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[8]" value="25"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][8]) ? 'checked' : '' }} @endif>
                        <span span class="ml-2">Meja dan Kursi Belajar</span>
                    </label>
                    <label class="inline-flex items-center ml-10 mt-2">
                        <input type="checkbox" class="form-checkbox" name="fasilitas[9]" value="15"
                            @if ($data_form != null) {{ isset($data_form['fasilitas'][9]) ? 'checked' : '' }} @endif>
                        <span class="ml-2">Laundry</span>
                    </label>
                </div>
            </div>
            <div class="md:flex md:items-center -mx-3 mb-6 mt-10">
                <div class="md:w-2/3 ml-3">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mr-auto"
                        type="submit">
                        Check it
                    </button>
                </div>
            </div>
        </form>
    </section>
    </section>
    <section class="h-full w-full border-box bg-white">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .btn-outline-content-2-1 {
                border: 1px solid #979797;
                color: #979797;
            }

            .btn-outline-content-2-1:hover {
                border: 1px solid #FF7C57;
                color: #FF7C57;
            }

            .btn-fill-content-2-1 {
                border: 1px solid #FF7C57;
            }

            .card-header-content-2-1 {
                background-color: #FFF7F4;
                border: 1px solid #FF7C57;
            }

            @media(min-width: 1024px) {
                .lg-show-content-2-1 {
                    display: block;
                }

                .lg-hide-content-2-1 {
                    display: none;
                }
            }

            @media(max-width: 1024px) {
                .lg-show-content-2-1 {
                    display: none;
                }

                .lg-hide-content-2-1 {
                    display: block;
                }
            }
        </style>
        <div style="font-family: 'Poppins', sans-serif;">
            <div class="container pb-12 mx-auto">
                <!-- Title Text -->
                <div class="flex flex-col text-center w-full">
                    <h2 class="text-base font-light title-font mx-12 lg:w-full md:w-full sm:w-3/6 sm:mx-auto mb-4"
                        style="color: #121212;">PERKIRAAN HARGA</h2>
                    <h1 class="text-4xl font-semibold title-font mb-2.5" style="color: #121212;">Rp.
                        {{ $result_price != null ? number_format($result_price, 0, '.', '.') : '-' }},-</h1>
                </div>
            </div>


        </div>
        <section class="h-full pt-20 pb-12 lg:px-24 md:px-16 sm:px-8 px-4 bg-white">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

                .list-footer-2-1 li a {
                    color: #C7C7C7;
                }

                .list-footer-2-1 li a:hover {
                    color: #555252;
                    cursor: pointer;
                }

                .border-color-footer-2-1 {
                    color: #C7C7C7;
                }

                .footer-link-footer-2-1:hover {
                    color: #555252;
                    cursor: pointer;
                }

                .social-media-c-footer-2-1:hover circle,
                .social-media-p-footer-2-1:hover path {
                    fill: #555252;
                    cursor: pointer;
                }
            </style>
        </section>
</body>

</html>
