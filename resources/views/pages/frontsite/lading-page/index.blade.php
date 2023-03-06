@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
{{-- BEGIN NAVBAR --}}
<nav class="flex justify-between items-center mx-10 my-5">
   <div class="flex items-center space-x-3">
      <img src="{{ asset('assets/images/profile2user.svg') }}" alt="Logo">
      <span class="text-2xl font-semibold text-black-color">lapor!</span>
   </div>
   <ul class="flex py-3 px-6 text-black-color font-semibold border border-light-gray rounded-full">
      <li class="mr-6">
         <a href="#">Home</a>
      </li>
      <li class="mr-6">
         <a href="#">Buat Laporan</a>
      </li>
      <li class="mr-6">
         <a href="#">Tentang Lapor!</a>
      </li>
      <li>
         <a href="#">Laporan</a>
      </li>
   </ul>
   @guest
   <div class="space-x-3.5">
      <a href="{{ route('login.index') }}" class="text-black-color font-semibold">Log in</a>
      <a href="{{ route('register.index') }}"
         class="px-5 py-2.5 bg-black-color text-white-color font-semibold rounded-full">Sign up</a>
   </div>
   @endguest
   @auth
   <div class="hidden lg:ml-10 lg:flex lg:items-center pl-4 pt-2">
      <div x-data="{ profileDekstopOpen: false }" class="ml-3 relative">
         <div>
            <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none" id="user-menu-button"
               aria-expanded="false" aria-haspopup="true" @click="profileDekstopOpen = ! profileDekstopOpen">
               <!-- focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 -->
               <span class="sr-only">Open user menu</span>
               <div class="text-right mr-5">
                  <div class="text-base font-medium text-black-color">
                     Hi, {{ auth()->user()->name }}
                  </div>
                  {{-- this section must read from type user --}}
                  <div class="text-sm text-paragraph-color">Masyarakat</div>
               </div>
               <img class="h-12 w-12 rounded-full ring-1 ring-offset-4 ring-dark-gray"
                  src="{{ asset('assets/images/user-profile.svg') }}" alt="User Profile" />
            </button>
         </div>
         <div x-show="profileDekstopOpen" @click.outside="profileDekstopOpen = false"
            x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="origin-top-right absolute z-30 right-0 mt-2 w-48 rounded-md card-shadow border border-light-gray py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="#" class="block px-4 py-2 text-sm text-black-color hover:bg-light-gray" role="menuitem"
               tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="block px-4 py-2 text-sm text-black-color hover:bg-light-gray" role="menuitem" tabindex="-1"
               id="user-menu-item-2">
               Sign out

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                  @csrf
               </form>
            </a>
         </div>
      </div>
   </div>
   {{-- <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="px-5 py-2.5 bg-black-color text-white-color font-semibold rounded-full">Log
         out</button>
   </form> --}}
   @endauth
</nav>
{{-- END NAVBAR --}}

<div class="container-padded-home mx-auto">

   {{-- BEGIN HERO --}}
   <div class="my-36">
      <div class="py-1 px-4 mb-6 border border-[#CDB3DE] rounded-full inline-block">
         <div class="flex items-center space-x-4">
            <span class="font-medium">Buat Laporan</span>
            <img src="{{ asset('assets/images/arrow_right.svg') }}" alt="arrow_right">
         </div>
      </div>
      <div class="flex items-center space-x-16">
         <div class="flex-shrink">
            <h1 class="text-title font-bold text-title-color mb-6">
               Selamat
               Datang di
               Aplikasi Laporan
               Masyarakat
            </h1>
            <p class="text-dark-gray leading-8">Layanan Aspirasi dan Pengaduan Online Masyarakat Kota Bogor.
               Sampaikan laporan
               Anda
               langsung
               kepada Kami.</p>
         </div>
         <div class="flex-auto">
            <img src="{{ asset('assets/images/Hero_Images.svg') }}" alt="Hero Image" style="width: 1350px">
         </div>
      </div>
   </div>
   {{-- END HERO --}}

</div>

{{-- BEGIN LAPORAN SAAT INI --}}
<div class="w-full h-[267px] bg-black-color relative mb-[112px]"
   style="background-image: url({{ asset('assets/images/message_background.svg') }}); background-repeat: space; background-position: center 10px;">
   <div class="flex justify-center items-center text-center h-full">
      <div class="flex flex-col">
         <div class="text-[#858690] font-bold text-[32px] uppercase inline-block">Jumlah Laporan Saat Ini</div>
         <div class="text-[#858690] font-bold text-[48px] inline-block">2,983</div>
      </div>
   </div>
</div>
{{-- END LAPORAN SAAT INI --}}

<div class="container-padded-home mx-auto">

   {{-- BEGIN LAPORAN SELESAI --}}
   <h2 class="text-[32px] text-title-color font-semibold mb-[24px]">Laporan Selesai</h2>
   <div class="flex px-6 py-6 space-x-14 overflow-x-auto mb-[112px]">
      <div class="w-[404px] flex-shrink-0 card-shadow rounded-lg py-[26px] px-[24px] bg-white relative"
         style="background-image: url({{ asset('assets/images/selesai.svg') }}); background-repeat: no-repeat; background-position: 280px 130px;">
         <h4 class="text-[20px] text-black-color font-semibold mb-2.5">Tempat Pembuangan Sampah Ilegal Di Pinggir
            Jalan
            Meresahkan
            Warga</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-2.5">Masyarakat yang sering melewati jalan
            jagarayu,
            ciracas kota serang yang
            arah menuju
            perumahan sepang
            mountain residence
            sering sekali buang...</p>
         <div class="flex items-center space-x-2.5">
            <img src="{{ asset('assets/images/user-1.jpg') }}" class="w-[33px] rounded-full" alt="user_1">
            <span class="text-[13px] font-medium text-black-color">Jamal Jacob</span>
         </div>
      </div>
      <div class="w-[404px] flex-shrink-0 card-shadow rounded-lg py-[26px] px-[24px] bg-white relative"
         style="background-image: url({{ asset('assets/images/selesai.svg') }}); background-repeat: no-repeat; background-position: 280px 130px;">
         <h4 class="text-[20px] text-black-color font-semibold mb-2.5">Tempat Pembuangan Sampah Ilegal Di Pinggir
            Jalan
            Meresahkan
            Warga</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-2.5">Masyarakat yang sering melewati jalan
            jagarayu,
            ciracas kota serang yang
            arah menuju
            perumahan sepang
            mountain residence
            sering sekali buang...</p>
         <div class="flex items-center space-x-2.5">
            <img src="{{ asset('assets/images/user-1.jpg') }}" class="w-[33px] rounded-full" alt="user_1">
            <span class="text-[13px] font-medium text-black-color">Jamal Jacob</span>
         </div>
      </div>
      <div class="w-[404px] flex-shrink-0 card-shadow rounded-lg py-[26px] px-[24px] bg-white relative"
         style="background-image: url({{ asset('assets/images/selesai.svg') }}); background-repeat: no-repeat; background-position: 280px 130px;">
         <h4 class="text-[20px] text-black-color font-semibold mb-2.5">Tempat Pembuangan Sampah Ilegal Di Pinggir
            Jalan
            Meresahkan
            Warga</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-2.5">Masyarakat yang sering melewati jalan
            jagarayu,
            ciracas kota serang yang
            arah menuju
            perumahan sepang
            mountain residence
            sering sekali buang...</p>
         <div class="flex items-center space-x-2.5">
            <img src="{{ asset('assets/images/user-1.jpg') }}" class="w-[33px] rounded-full" alt="user_1">
            <span class="text-[13px] font-medium text-black-color">Jamal Jacob</span>
         </div>
      </div>
   </div>
   {{-- END LAPORAN SELESAI --}}

   {{-- BEGIN LAPORAN TERBARU --}}
   <h2 class="text-[32px] text-title-color font-semibold mb-[24px]">Laporan Terbaru</h2>
   <div class="flex flex-col px-6 py-6 space-y-8 overflow-y-auto h-156 mb-[128px]">
      <div class="w-full card-shadow rounded-lg p-[42px]">
         <h4 class="text-[20px] text-black-color font-semibold mb-4">Tempat Pembuangan Sampah Ilegal Di Pinggir
            Bobroknya Pelayanan Kantor Kecamatan</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-4">Berikut saya lampirkan tanggapan dari bpn
            banyuwangi pada laporan saya sebelumnya perihal permohonan konversi nb
            91952/2022. menurut saya tanggapan tersebut sangat kacau, tidak profesional dan tidak mempunyai dasar hukum.
            saya merasa
            sangat dipermain.....</p>
         <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2.5">
               <img src="{{ asset('assets/images/user-1.jpg') }}" class="w-[33px] rounded-full" alt="user_1">
               <span class="text-[13px] font-medium text-black-color">Jamal Jacob</span>
            </div>
            <div class="flex space-x-5">
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/komentar.svg') }}" style="width: 16px; height: 16px;"
                     alt="komentar">
                  <span class="text-[12px] text-black-color">7 Komentar</span>
               </div>
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/like.svg') }}" style="width: 16px; height: 16px;" alt="like">
                  <span class="text-[12px] text-black-color">35 Dukungan</span>
               </div>
            </div>
         </div>
      </div>
      <div class="w-full card-shadow rounded-lg p-[42px]">
         <h4 class="text-[20px] text-black-color font-semibold mb-4">Tempat Pembuangan Sampah Ilegal Di Pinggir
            Bobroknya Pelayanan Kantor Kecamatan</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-4">Berikut saya lampirkan tanggapan dari bpn
            banyuwangi pada laporan saya sebelumnya perihal permohonan konversi nb
            91952/2022. menurut saya tanggapan tersebut sangat kacau, tidak profesional dan tidak mempunyai dasar hukum.
            saya merasa
            sangat dipermain.....</p>
         <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2.5">
               <img src="{{ asset('assets/images/user-1.jpg') }}" class="w-[33px] rounded-full" alt="user_1">
               <span class="text-[13px] font-medium text-black-color">Jamal Jacob</span>
            </div>
            <div class="flex space-x-5">
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/komentar.svg') }}" style="width: 16px; height: 16px;"
                     alt="komentar">
                  <span class="text-[12px] text-black-color">7 Komentar</span>
               </div>
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/like.svg') }}" style="width: 16px; height: 16px;" alt="like">
                  <span class="text-[12px] text-black-color">35 Dukungan</span>
               </div>
            </div>
         </div>
      </div>
      <div class="w-full card-shadow rounded-lg p-[42px]">
         <h4 class="text-[20px] text-black-color font-semibold mb-4">Tempat Pembuangan Sampah Ilegal Di Pinggir
            Bobroknya Pelayanan Kantor Kecamatan</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-4">Berikut saya lampirkan tanggapan dari bpn
            banyuwangi pada laporan saya sebelumnya perihal permohonan konversi nb
            91952/2022. menurut saya tanggapan tersebut sangat kacau, tidak profesional dan tidak mempunyai dasar hukum.
            saya merasa
            sangat dipermain.....</p>
         <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2.5">
               <img src="{{ asset('assets/images/user-1.jpg') }}" class="w-[33px] rounded-full" alt="user_1">
               <span class="text-[13px] font-medium text-black-color">Jamal Jacob</span>
            </div>
            <div class="flex space-x-5">
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/komentar.svg') }}" style="width: 16px; height: 16px;"
                     alt="komentar">
                  <span class="text-[12px] text-black-color">7 Komentar</span>
               </div>
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/like.svg') }}" style="width: 16px; height: 16px;" alt="like">
                  <span class="text-[12px] text-black-color">35 Dukungan</span>
               </div>
            </div>
         </div>
      </div>
      <div class="w-full card-shadow rounded-lg p-[42px]">
         <h4 class="text-[20px] text-black-color font-semibold mb-4">Tempat Pembuangan Sampah Ilegal Di Pinggir
            Bobroknya Pelayanan Kantor Kecamatan</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-4">Berikut saya lampirkan tanggapan dari bpn
            banyuwangi pada laporan saya sebelumnya perihal permohonan konversi nb
            91952/2022. menurut saya tanggapan tersebut sangat kacau, tidak profesional dan tidak mempunyai dasar hukum.
            saya merasa
            sangat dipermain.....</p>
         <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2.5">
               <img src="{{ asset('assets/images/user-1.jpg') }}" class="w-[33px] rounded-full" alt="user_1">
               <span class="text-[13px] font-medium text-black-color">Jamal Jacob</span>
            </div>
            <div class="flex space-x-5">
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/komentar.svg') }}" style="width: 16px; height: 16px;"
                     alt="komentar">
                  <span class="text-[12px] text-black-color">7 Komentar</span>
               </div>
               <div class="flex space-x-[5px]">
                  <img src="{{ asset('assets/images/like.svg') }}" style="width: 16px; height: 16px;" alt="like">
                  <span class="text-[12px] text-black-color">35 Dukungan</span>
               </div>
            </div>
         </div>
      </div>
   </div>

   {{-- END LAPORAN TERBARU --}}
</div>

<hr class="text-[#DBDBDB]">


<div class="container-padded-home mx-auto">

   {{-- BEGIN FOOTER --}}
   <div class="pt-[58px] pb-[68px]">
      <div class="flex justify-between">
         <div class="flex flex-col">
            <div class="flex items-center space-x-3 mb-[18px]">
               <img src="{{ asset('assets/images/profile2user.svg') }}" alt="Logo">
               <span class="text-2xl font-semibold text-black-color">lapor!</span>
            </div>
            <span class="text-base font-medium text-dark-gray w-[14.25rem] mb-[34px]">Jalan Raya Puncak Kec. Cisarua
               Kab.
               Bogor -
               Jawa
               Barat</span>
            <div class="flex flex-col space-y-5 mb-[58px]">
               <div class="flex space-x-3">
                  <img src="{{ asset('assets/images/email.svg') }}" alt="email">
                  <span class="text-base font-medium text-dark-gray">lapori.bogor@gmail.com</span>
               </div>
               <div class="flex space-x-3">
                  <img src="{{ asset('assets/images/phone.svg') }}" alt="phone">
                  <span class="text-base font-medium text-dark-gray">0838 1165 5736 (WA)</span>
               </div>
               <div class="flex space-x-3">
                  <img src="{{ asset('assets/images/global.svg') }}" alt="global">
                  <span class="text-base font-medium text-dark-gray">www.lapori.com</span>
               </div>
            </div>
            <span class="text-base font-semibold text-black-color">Copyright @ 2023 lapori. All Right Reserved</span>
         </div>
         <div class="flex space-x-[54px]">
            <div class="flex flex-col space-y-[23px]">
               <span class="text-[20px] font-semibold text-black-color">Company</span>
               <span class="text-[16px] font-medium text-dark-gray">Tentang Kami</span>
               <span class="text-[16px] font-medium text-dark-gray">Visi & Misi</span>
               <span class="text-[16px] font-medium text-dark-gray">How It Works</span>
               <span class="text-[16px] font-medium text-dark-gray">Advantages</span>
            </div>
            <div class="flex flex-col space-y-[23px]">
               <span class="text-[20px] font-semibold text-black-color">Layanan</span>
               <span class="text-[16px] font-medium text-dark-gray">Pelaporan</span>
               <span class="text-[16px] font-medium text-dark-gray">Pengaduan</span>
               <span class="text-[16px] font-medium text-dark-gray">Tanggapan</span>
            </div>
            <div class="flex flex-col space-y-[23px]">
               <span class="text-[20px] font-semibold text-black-color">Portfolio</span>
               <span class="text-[16px] font-medium text-dark-gray">Client</span>
               <span class="text-[16px] font-medium text-dark-gray">How We Works</span>
               <span class="text-[16px] font-medium text-dark-gray">Testimonial</span>
            </div>
         </div>
      </div>
   </div>
   {{-- END FOOTER --}}

</div>

@endsection