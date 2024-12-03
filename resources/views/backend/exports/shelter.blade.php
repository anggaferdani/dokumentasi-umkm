<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid; text-align: center; vertical-align: middle;" colspan="9"><h2>List Data Shelter</h2></th>
      </tr>
  </thead>
</table>
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
            $ditempati = $shelter->umkms->reduce(function ($carry, $umkm) {
                if ($umkm->shift == 'pagi malam') {
                    return $carry + 2;
                } elseif ($umkm->shift == 'pagi' || $umkm->shift == 'malam') {
                    return $carry + 1;
                }
                return $carry;
                }, 0);
            $kosong = $shelter->kapasitas - $ditempati;
            $berSIP = $shelter->umkms->filter(function ($umkm) {
            return $umkm->surat_ijin_penempatan === "ada";
            })->count();
        @endphp
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $shelter->alamat ?? '-' }}, {{ $shelter->subdistrict->district->dis_name ?? '-' }}, {{ $shelter->subdistrict->subdis_name }}</td>
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