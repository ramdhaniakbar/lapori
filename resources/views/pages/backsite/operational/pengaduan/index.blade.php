@extends('layouts.dashboard')

@section('title', 'Pengaduan')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        {{-- error --}}
        @if ($errors->any())
        <div class="alert bg-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- breadcumb --}}
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Pengaduan</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Pengaduan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- add card --}}
        <div class="content-body">
            <section id="add-home">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <a data-action="collapse">
                                    <h4 class="card-title text-white">Tanggapi</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>

                            <div class="card-content collapse hide">
                                <div class="card-body card-dashboard">

                                    <form class="form form-horizontal" action="{{ route('backsite.tanggapan.store') }}"
                                        method="POST">

                                        @csrf

                                        <div class="form-body">
                                            <div class="form-section">
                                                <p>Harap lengkapi input yang <code>required</code>, sebelum Anda
                                                    mengklik tombol
                                                    kirim.</p>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="body_response">Isi
                                                    Tanggapan<code style="color:red;">required</code></label>
                                                <div class="col-md-9 mx-auto">

                                                    <textarea name="body_response" id="body_response" cols="30"
                                                        rows="10" class="form-control"
                                                        placeholder="contoh Baik, akan kami diskusikan"
                                                        autocomplete="off"
                                                        required>{{ old('body_response') }}</textarea>

                                                    @if($errors->has('body_response'))
                                                    <p style="font-style: bold; color: red;">{{
                                                        $errors->first('body_response')
                                                        }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="response_date">Tanggal
                                                    Tanggapan<code style="color:red;">required</code></label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="date" id="response_date" name="response_date"
                                                        class="form-control" placeholder="example admin or users"
                                                        value="{{old('response_date')}}" autocomplete="off" required>

                                                    @if($errors->has('response_date'))
                                                    <p style="font-style: bold; color: red;">{{
                                                        $errors->first('response_date')
                                                        }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="response_date">Ke
                                                    Pengaduan<code style="color:red;">required</code></label>
                                                <div class="col-md-9 mx-auto">
                                                    <select name="report_id" id="report_id" class="form-control">
                                                        <option selected disabled>Pilih Pengaduan</option>
                                                        @foreach ($reports as $key => $report)
                                                        <option value="{{ $report->id }}">{{ $report->user->email }} -
                                                            {{
                                                            $report->title_report }}</option>
                                                        @endforeach
                                                    </select>

                                                    @if($errors->has('response_date'))
                                                    <p style="font-style: bold; color: red;">{{
                                                        $errors->first('response_date')
                                                        }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-actions text-right">
                                            <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                onclick="return confirm('Are you sure want to save this data ?')">
                                                <i class="la la-check-square-o"></i> Submit
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        {{-- table card --}}
        <div class="content-body">
            <section id="table-home">
                <!-- Zero configuration table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pengaduan</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered text-inputs-searching default-table">
                                            <thead>
                                                <tr>
                                                    <th>Judul Pengaduan</th>
                                                    <th>Isi Pengaduan</th>
                                                    <th>Lokasi Pengaduan</th>
                                                    <th>Status</th>
                                                    <th>Waktu Kejadian</th>
                                                    <th style="text-align:center; width:150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($reports as $key => $report)
                                                <tr data-entry-id="{{ $report->id }}">
                                                    <td>{{ $report->title_report }}</td>
                                                    <td>{{ Str::limit($report->body_report, 60, '...') }}</td>
                                                    <td>{{ $report->location_incident }}</td>
                                                    <td>{{ $report->status }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($report->incident_date)) }}</td>
                                                    <td class="text-center">

                                                        <div class="btn-group mr-1 mb-1">
                                                            <button type="button"
                                                                class="btn btn-info btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">
                                                                <a href="#mymodal"
                                                                    data-remote="{{ route('backsite.pengaduan.show', $report->id) }}"
                                                                    data-toggle="modal" data-target="#mymodal"
                                                                    data-title="Detail Pengaduan" class="dropdown-item">
                                                                    Show
                                                                </a>

                                                                <form action="" method="POST"
                                                                    onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="dropdown-item"
                                                                        value="Tolak">
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                {{-- not found --}}
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Judul Pengaduan</th>
                                                    <th>Isi Pengaduan</th>
                                                    <th>Lokasi Pengaduan</th>
                                                    <th>Status</th>
                                                    <th>Waktu Kejadian</th>
                                                    <th style="text-align:center; width:150px;">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
<!-- END: Content-->

@endsection

@push('after-script')
<script>
    jQuery(document).ready(function($){
            $('#mymodal').on('show.bs.modal', function(e){
                var button = $(e.relatedTarget);
                var modal = $(this);
                modal.find('.modal-body').load(button.data("remote"));
                modal.find('.modal-title').html(button.data("title"));
            });
        });

      $('.default-table').DataTable({
         "order": [],
         "paging": true,
         "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, 'All'] ],
         "pageLength": 25
      });
</script>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa spin"></i>
            </div>
        </div>
    </div>
</div>
@endpush