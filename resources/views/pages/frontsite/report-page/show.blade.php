@extends('layouts.app')

@section('title', 'Edit Laporan!')

@section('content')
{{-- BEGIN HEADER --}}
@include('components.frontsite.header')
{{-- END HEADER --}}

<div class="container-padded-home mx-auto mt-[110px]">
   <div class="flex justify-between">
      <span class="font-medium text-dark-gray text-[18px] mb-[40px] inline-block">Kategori: {{
         $lapor->report_category->name
         }}</span>
      <span class="font-medium text-dark-gray text-[18px] mb-[40px] inline-block">Tanggal Kejadian: {{ $incident_date
         }}</span>
   </div>

   @if ($lapor->report_image !== 'noimage.png')
   <div class="w-full h-[600px] rounded-xl bg-cover bg-center mb-[60px]"
      style="background-image: url('/storage/images/{{ $lapor->report_image }}')">
   </div>
   @endif

   <div class="flex justify-between items-center mb-[38px]">
      <h2 class="font-bold text-black-color text-[32px]">{{ $lapor->title_report }}</h2>
      <span class="px-3 py-1 rounded-full capitalize text-[16px] font-medium
         @if ($lapor->status == 'pending') bg-light-gray text-black-color
         @elseif ($lapor->status == 'proses') bg-blue-color text-white-color
         @elseif ($lapor->status == 'ditolak') bg-red-color text-white-color
         @else bg-green-color text-black-color
         @endif
      ">{{ $lapor->status }}
      </span>
   </div>

   <div class="w-full mb-[70px]">
      <p class="font-medium text-[20px] text-dark-gray">{{ $lapor->body_report }}</p>
   </div>

   <div>
      <h2 class="font-semibold text-[30px] text-black-color mb-[38px]">Tanggapan</h2>

      <hr class="text-[#DBDBDB]">

      <div class="mt-[36px] mb-[112px]">
         <div class="flex items-start space-x-6">
            <img src="{{ asset('assets/frontsite/images/user-profile.svg') }}" style="width: 70px;" alt="profile user">
            <div class="flex flex-col">
               <span class="font-medium text-black-color text-[24px]">Julian Malcolm</span>
               <span class="text-black-color text-[16px] mb-[20px]">Admin</span>
               <p class="font-medium text-[20px] text-dark-gray">Berikut saya lampirkan tanggapan dari bpn
                  banyuwangi pada laporan saya sebelumnya perihal permohonan
                  konversi nb
                  91952/2022. menurut saya tanggapan tersebut sangat kacau, tidak profesional dan tidak mempunyai dasar
                  hukum. saya merasa
                  sangat dipermain....</p>
            </div>
         </div>
      </div>
   </div>
</div>

<hr class="text-[#DBDBDB]">

<div class="container-padded-home mx-auto">

   {{-- BEGIN FOOTER --}}
   @include('components.frontsite.footer')
   {{-- END FOOTER --}}

</div>

@endsection