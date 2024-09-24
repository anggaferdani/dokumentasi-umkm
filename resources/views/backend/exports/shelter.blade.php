<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid;">No.</th>
          <th style="border: 1px black solid;">Shelter</th>
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
              return !empty($umkm->nomor_sip);
          })->count();
        @endphp
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $ditempati }}</td>
          <td style="border: 1px black solid;">{{ $kosong }}</td>
          <td style="border: 1px black solid;">{{ $shelter->kapasitas }}</td>
          <td style="border: 1px black solid;">{{ $berSIP }}</td>
          <td style="border: 1px black solid;">{{ $ditempati - $berSIP }}</td>
          <td style="border: 1px black solid;">
            @foreach($shelter->umkms as $umkm)
              @if(!empty($umkm->note))
                {{ $umkm->note }}@if(!$loop->last), @endif
              @endif
            @endforeach
          </td>
      </tr>
      @endforeach
  </tbody>
</table>