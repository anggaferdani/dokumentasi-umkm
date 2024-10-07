<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid;">No.</th>
          <th style="border: 1px black solid;">Nama</th>
          <th style="border: 1px black solid;">Tempat, Tanggal Lahir</th>
          <th style="border: 1px black solid;">Alamat</th>
          <th style="border: 1px black solid;">Untuk Menempati Shelter</th>
          <th style="border: 1px black solid;">Nomor Shelter</th>
          <th style="border: 1px black solid;">Shift</th>
          <th style="border: 1px black solid;">Surat Ijin Penempatan</th>
          <th style="border: 1px black solid;">Retribusi</th>
          <th style="border: 1px black solid;">Jenis Dagangan</th>
          <th style="border: 1px black solid;">Nomor SIP</th>
          <th style="border: 1px black solid;">Valid SIP</th>
          <th style="border: 1px black solid;">Note</th>
      </tr>
  </thead>
  <tbody>
      @foreach($umkms as $umkm)
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $umkm->nama }}</td>
          <td style="border: 1px black solid;">{{ $umkm->tempat_lahir }}, {{ $umkm->tanggal_lahir }}</td>
          <td style="border: 1px black solid;">{{ $umkm->alamat }}</td>
          <td style="border: 1px black solid;">{{ $umkm->shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $umkm->nomor_booth ?? '-' }}</td>
          <td style="border: 1px black solid;">{{ $umkm->shift }}</td>
          <td style="border: 1px black solid;">{{ $umkm->surat_ijin_penempatan }}</td>
          <td style="border: 1px black solid;">{{ $umkm->retribusi }}</td>
          <td style="border: 1px black solid;">{{ $umkm->jenis_dagangan }}</td>
          <td style="border: 1px black solid;">{{ $umkm->nomor_sip }}</td>
          <td style="border: 1px black solid;">{{ $umkm->valid_sip }}</td>
          <td style="border: 1px black solid;">{{ $umkm->note }}</td>
      </tr>
      @endforeach
  </tbody>
</table>