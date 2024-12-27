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
          <th style="border: 1px black solid;">Total</th>
          <th style="border: 1px black solid;">Ber SIP</th>
          <th style="border: 1px black solid;">Selisih</th>
          <th style="border: 1px black solid;">Kosong</th>
          <th style="border: 1px black solid;">Notes</th>
      </tr>
  </thead>
  <tbody>
      @foreach($shelters as $shelter)
      @php
        $ditempatiPagi = 0;
        $ditempatiMalam = 0;
        $kosongPagi = $shelter->kapasitas;
        $kosongMalam = $shelter->kapasitas;
        $berSIPPagi = 0;
        $berSIPMalam = 0;

        foreach ($shelter->umkms as $umkm) {
            if ($umkm->shift == 'pagi') {
            $ditempatiPagi += 1;
            $berSIPPagi += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
            $kosongPagi -= 1;
            } elseif ($umkm->shift == 'malam') {
            $ditempatiMalam += 1;
            $berSIPMalam += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
            $kosongMalam -= 1;
            } elseif ($umkm->shift == 'pagi malam') {
            $ditempatiPagi += 1;
            $ditempatiMalam += 1;
            $berSIPPagi += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
            $berSIPMalam += ($umkm->surat_ijin_penempatan === "ada") ? 1 : 0;
            $kosongPagi -= 1;
            $kosongMalam -= 1;
            }
        }

        $selisihPagi = $ditempatiPagi - $berSIPPagi;
        $selisihMalam = $ditempatiMalam - $berSIPMalam;
        @endphp
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $shelter->alamat ?? '-' }}, {{ $shelter->subdistrict->district->name ?? '-' }}, {{ $shelter->subdistrict->name }}</td>
          <td style="white-space: nowrap; border: 1px black solid;">
            <div>Pagi: {{ $ditempatiPagi }}</div>
            <div>Malam: {{ $ditempatiMalam }}</div>
          </td>
          <td style="white-space: nowrap; border: 1px black solid;">
            <div>Pagi: {{ $kosongPagi }}</div>
            <div>Malam: {{ $kosongMalam }}</div>
          </td>
          <td style="white-space: nowrap; border: 1px black solid;">
            <div>Pagi: {{ $berSIPPagi }}</div>
            <div>Malam: {{ $berSIPMalam }}</div>
          </td>
          <td style="white-space: nowrap; border: 1px black solid;">
            <div>Pagi: {{ $selisihPagi }}</div>
            <div>Malam: {{ $selisihMalam }}</div>
          </td>
          <td style="white-space: nowrap; border: 1px black solid;">{{ $shelter->kapasitas }}</td>
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