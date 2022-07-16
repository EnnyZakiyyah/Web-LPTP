<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <table class="table">
        <thead>
          <tr>
            <th scope="col">Jenis Buku</th>
            <th scope="col">Jumlah</th>
          </tr>
        </thead>
        <tbody>
            @if ($categories->count() > 0)
            @foreach ($categories as $category)
            <tr>
              <th>{{ $category->name }}</th>
              <td>{{ $category->katalogs->count('pivot.category_id') }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
      </table>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Jenis Buku</th>
            <th scope="col">Jumlah</th>
          </tr>
        </thead>
        <tbody>
            @if ($kondisi->count() > 0)
            @foreach ($kondisi as $item)
            <tr>
              <th>{{ $item->nama }}</th>
              <td>{{ $item->peminjamans->count('pivot.id_kondisi') }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
      </table> --}}

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Jenis Buku</th>
            <th scope="col">Jumlah</th>
          </tr>
        </thead>
        <tbody>
            {{-- @if ($categories->count() > 0) --}}
            @foreach ($cetak as $item)
            <tr>
              <th>{{ $item->no_peminjaman }}</th>
              {{-- <td>{{ $category->katalogs->count('pivot.category_id') }}</td> --}}
            </tr>
            @endforeach
            {{-- @endif --}}
        </tbody>
      </table>
</body>
</html>