@extends('layouts.app')

@section('title', 'Buat Laporan!')

@section('content')
{{-- BEGIN HEADER --}}
@include('components.frontsite.header')
{{-- END HEADER --}}

<div class="container-padded-home mx-auto mt-[110px]">
   <h1 class="font-bold text-[36px] text-title-color w-[518px] mb-[53px]">Laporan Terbaru Kamu!</h1>
   <div class="flex space-x-9 mb-[126px]">
      <div class="flex w-10/12 flex-col px-6 py-6 space-y-8 overflow-y-auto h-156">
         @forelse ($reports as $key => $report)
         <div class="h-fit card-shadow rounded-lg p-[42px]">
            <a href="{{ route('lapor.show', $report->id) }}">
               <h4 class="text-[20px] text-black-color font-semibold mb-4">{{ $report->title_report }}</h4>
            </a>
            <p class="text-[13px] font-medium text-paragraph-color mb-4">{{ $report->body_report }}</p>
            <div class="flex justify-between items-center">
               <div class="flex items-center text-[13px] font-medium space-x-2.5">
                  <span class="text-black-color">{{ $report->created_at->diffForHumans()
                     }}</span>
                  <span class="px-3 py-1 rounded-full capitalize 
                  @if ($report->status == 'pending') bg-light-gray text-black-color
                  @elseif ($report->status == 'proses') bg-blue-color text-white-color
                  @elseif ($report->status == 'ditolak') bg-red-color text-white-color
                  @else bg-green-color text-black-color
                  @endif
               ">{{ $report->status }}
                  </span>
               </div>
               <div class="flex items-center text-title-color font-semibold space-x-2 text-[13px]">
                  {{-- <a href="{{ route('lapor.show', $report->id) }}">
                     <div class="p-2 bg-black-color rounded-lg">
                        <img src="{{ asset('assets/frontsite/images/detail.svg') }}" alt="">
                     </div>
                  </a> --}}
                  <a href="{{ route('lapor.edit', $report->id) }}" class="p-2 bg-black-color rounded-lg">
                     <img src="{{ asset('assets/frontsite/images/edit.svg') }}" alt="">
                  </a>
                  <a href="{{ route('lapor.destroy', $report->id) }}"
                     onclick="event.preventDefault(); document.getElementById('delete-report').submit();"
                     class="p-2 bg-black-color rounded-lg">
                     <img src="{{ asset('assets/frontsite/images/delete.svg') }}" alt="">
                  </a>

                  <form id="delete-report" action="{{ route('lapor.destroy', $report->id) }}" method="POST"
                     style="display: none">
                     @csrf
                     @method('DELETE')
                  </form>
               </div>
            </div>
         </div>
         @empty
         <p>No Data</p>
         @endforelse
      </div>
      <div class="flex-auto w-2/5 h-fit card-shadow rounded-lg p-14">
         <div class="flex flex-col justify-center items-center mb-8">
            <img src="{{ asset('assets/frontsite/images/user-profile.svg') }}" class="w-[72px] rounded-full mb-2"
               alt="user_1">
            <span class="text-[20px] font-semibold text-black-color">{{ auth()->guard(session('guard'))->user()->name
               }}</span>
            <span class="text-[15px] text-dark-gray">{{ auth()->guard(session('guard'))->user()->role ??
               'Masyarakat' }}</span>
         </div>
         <div class="flex justify-between text-[20px] font-medium text-dark-gray mb-8">
            <span>Total Laporan Kamu: </span>
            <span>{{ count($reports) }}</span>
         </div>
         <div class="flex justify-between">
            <div class="flex flex-col items-center">
               <span class="text-[15px] font-medium text-dark-gray">Pending</span>
               <span class="text-[18px] font-semibold text-dark-gray">{{ count($report_status['pending']) }}</span>
            </div>
            <div class="flex flex-col items-center">
               <span class="text-[15px] font-medium text-dark-gray">Proses</span>
               <span class="text-[18px] font-semibold text-dark-gray">{{ count($report_status['proses']) }}</span>
            </div>
            <div class="flex flex-col items-center">
               <span class="text-[15px] font-medium text-dark-gray">Ditolak</span>
               <span class="text-[18px] font-semibold text-dark-gray">{{ count($report_status['ditolak']) }}</span>
            </div>
            <div class="flex flex-col items-center">
               <span class="text-[15px] font-medium text-dark-gray">Selesai</span>
               <span class="text-[18px] font-semibold text-dark-gray">{{ count($report_status['selesai']) }}</span>
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