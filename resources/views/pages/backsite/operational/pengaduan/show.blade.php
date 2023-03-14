<table class="table table-bordered">
  <tr>
    <th>Judul Pengaduan</th>
    <td>{{ isset($pengaduan->title_report) ? $pengaduan->title_report : 'N/A' }}</td>
  </tr>
  <tr>
    <th>Isi Pengaduan</th>
    <td>{{ isset($pengaduan->body_report) ? $pengaduan->body_report : 'N/A' }}</td>
  </tr>
  <tr>
    <th>Lokasi Kejadian</th>
    <td>{{ isset($pengaduan->location_incident) ? $pengaduan->location_incident : 'N/A' }}</td>
  </tr>
  <tr>
    <th>Status Pengaduan</th>
    <td>{{ isset($pengaduan->status) ? $pengaduan->status : 'N/A' }}</td>
  </tr>
  <tr>
    <th>Tanggal Kejadian</th>
    <td>{{ isset($pengaduan->incident_date) ? date('d-m-Y', strtotime($pengaduan->incident_date)) : 'N/A' }}</td>
  </tr>
  <tr>
    <th>Foto Bukti</th>
    <td>
      <img src="
        @if ($pengaduan->report_image !== 'noimage.png')
          /storage/images/{{ $pengaduan->report_image }}
        @else
        /storage/images/noimage.png
        @endif
      " alt="bukti pengaduan" height="100" width="150">
    </td>
  </tr>
</table>