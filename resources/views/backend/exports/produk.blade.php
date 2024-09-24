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
          <th style="border: 1px black solid;">Kategori</th>
      </tr>
  </thead>
  <tbody>
      @foreach($produks as $produk)
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $produk->umkm->shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $produk->umkm->nomor_shelter }}</td>
          <td style="border: 1px black solid;">{{ $produk->umkm->nama }}</td>
          <td style="border: 1px black solid;">{{ $produk->foto_produk }}</td>
          <td style="border: 1px black solid;">{{ $produk->nama_produk }}</td>
          <td style="border: 1px black solid;">{{ $produk->deskripsi_produk }}</td>
          <td style="border: 1px black solid;">{{ $produk->kategori->kategori }}</td>
      </tr>
      @endforeach
  </tbody>
</table>