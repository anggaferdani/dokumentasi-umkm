<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid;">No.</th>
          <th style="border: 1px black solid;">Shelter</th>
          <th style="border: 1px black solid;">Alamat</th>
          <th style="border: 1px black solid;">Ditempati</th>
          <th style="border: 1px black solid;">Kosong</th>
          <th style="border: 1px black solid;">Total</th>
          <th style="border: 1px black solid;">Ber SIP</th>
          <th style="border: 1px black solid;">Selisih</th>
          <th style="border: 1px black solid;">Notes</th>
      </tr>
  </thead>
  <tbody>
      @foreach($shelters as $shelter)
        @php
            $ditempati = $shelter->umkms->count();
            $kosong = $shelter->kapasitas - $ditempati;
            $berSIP = $shelter->umkms->filter(function ($umkm) {
            return $umkm->surat_ijin_penempatan === "ada";
            })->count();
        @endphp
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $shelter->alamat ?? '-' }}, {{ $shelter->district->dis_name ?? '-' }}, {{ $shelter->subdistrict->subdis_name }}</td>
          <td style="border: 1px black solid;">{{ $ditempati }}</td>
          <td style="border: 1px black solid;">{{ $kosong }}</td>
          <td style="border: 1px black solid;">{{ $shelter->kapasitas }}</td>
          <td style="border: 1px black solid;">{{ $berSIP }}</td>
          <td style="border: 1px black solid;">{{ $ditempati - $berSIP }}</td>
          <td style="border: 1px black solid;">
            @php
                $umkmWithNotes = $shelter->umkms()->get()->filter(function ($umkm) {
                    return !empty($umkm->note);
                });
            @endphp

            @foreach($umkmWithNotes as $umkm)
                {{ $umkm->note }}@if(!$loop->last), @endif
            @endforeach
          </td>
      </tr>
      @endforeach
  </tbody>
</table>