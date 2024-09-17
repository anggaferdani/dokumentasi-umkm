<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px black solid;">No.</th>
          <th style="border: 1px black solid;">Booth</th>
          <th style="border: 1px black solid;">Foto Produk</th>
          <th style="border: 1px black solid;">Nama Produk</th>
          <th style="border: 1px black solid;">Kategori</th>
          <th style="border: 1px black solid;">Tempat Usaha</th>
      </tr>
  </thead>
  <tbody>
      @foreach($produks as $produk)
      <tr>
          <td style="border: 1px black solid;">{{ $loop->iteration }}</td>
          <td style="border: 1px black solid;">{{ $produk->booth->shelter->nama }}</td>
          <td style="border: 1px black solid;">{{ $produk->booth->nama }}</td>
          <td style="border: 1px black solid;">{{ $produk->foto_produk }}</td>
          <td style="border: 1px black solid;">{{ $produk->nama_produk }}</td>
          <td style="border: 1px black solid;">{{ $produk->deskripsi_produk }}</td>
          <td style="border: 1px black solid;">{{ $produk->kategori->kategori }}</td>
      </tr>
      @endforeach
  </tbody>
</table>