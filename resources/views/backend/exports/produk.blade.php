<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid; text-align: center; vertical-align: middle;" colspan="7"><h2>List Data Produk</h2></th>
      </tr>
  </thead>
</table>
<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid;">No.</th>
          <th style="border: 1px black solid;">Shelter</th>
          <th style="border: 1px black solid;">Nomor Shelter</th>
          <th style="border: 1px black solid;">Nama</th>
          <th style="border: 1px black solid;">Foto Produk</th>
          <th style="border: 1px black solid;">Nama Produk</th>
          <th style="border: 1px black solid;">Deskripsi Produk</th>
      </tr>
  </thead>
  <tbody>
      @foreach($produks as $produk)
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $produk->umkm->shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $produk->umkm->nomor_booth }}</td>
          <td style="border: 1px black solid;">{{ $produk->umkm->nama }}</td>
          <td style="border: 1px black solid;">{{ $produk->foto_produk ?? '-' }}</td>
          <td style="border: 1px black solid;">{{ $produk->nama_produk }}</td>
          <td style="border: 1px black solid;">{{ $produk->deskripsi_produk }}</td>
      </tr>
      @endforeach
  </tbody>
</table>