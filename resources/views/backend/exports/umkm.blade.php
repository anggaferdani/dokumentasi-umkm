<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid;">No.</th>
          <th style="border: 1px black solid;">Nama</th>
          <th style="border: 1px black solid;">Foto Produk</th>
          <th style="border: 1px black solid;">Nama Produk</th>
          <th style="border: 1px black solid;">Kategori</th>
          <th style="border: 1px black solid;">Tempat Usaha</th>
      </tr>
  </thead>
  <tbody>
      @foreach($umkms as $umkm)
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $umkm->nama }}</td>
          <td style="border: 1px black solid;">{{ $umkm->foto_produk }}</td>
          <td style="border: 1px black solid;">{{ $umkm->nama_produk }}</td>
          <td style="border: 1px black solid;">{{ $umkm->kategori->kategori }}</td>
          <td style="border: 1px black solid;">{{ $umkm->tempat_usaha }}</td>
      </tr>
      @endforeach
  </tbody>
</table>