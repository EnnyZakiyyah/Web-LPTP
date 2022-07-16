<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 90%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           /* background-color: #060b42; */
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .col-10 {
            float: right;
            width: 80%;
        }

        .col-2 {
            float: left;
            width: 10%;
        }

        .row:after{
            content: "";
            display: inline;
            clear: both;
        } 
        /* .text-white{
            color: #fff;
        } */
        .company-details{
            float: center;
            text-align: center;
        }
        .body-section{
            padding: 16px;
            /* border: 1px solid gray; */
        }

        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }

        .body-image{
            padding: 2px;
            /* border: 1px solid gray; */
        }

        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-2">
                    <img src="{{ public_path('keanggotaan/logo-lptp.png') }}" style="width:60px; height:60px;" alt="">
                </div>
                <div class="col-10">
                    <div class="company-details">
                        <p ><h4>PERPUSTAKAAN</h4></p>
                        <p ><h4>LEMBAGA PENGEMBANGAN TEKNOLOGI PEDESAAN</h4></p>
                        <p ><h4>SURAKARTA</h4></p>
                        <p style="font-size: 11px">Jl. Raya Palur Km. 5 Tagal Asri, RT.04/RW.06, Jurug, Ngringo, </p>
                        <p style="font-size: 11px">Kec. Jaten, Kabupaten Karanganyar, Jawa Tengah 57731 </p>
                    </div>
                </div>
            </div>
            <hr style="border: 4px">
        </div>
        
        <div class="body-section">
            <h3 class="heading" style="text-align: center">LAPORAN</h3>
            <br>
            <p style="padding-left: 25px; text-align: justify; padding-right:25px;">I. Anggota</p>
            <br>
            <table class="table">
                {{-- @foreach ($data as $row) --}}
                <tr>
                    <th>Jenis Anggota</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td>Jenis Anggota</td>
                    <td>Jumlah</td>
                </tr>
                {{-- @endforeach --}}
            </table>
            <p style="padding-left: 25px; text-align: justify; padding-right:25px;">II. Koleksi</p>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th>No Peminjaman</th>
                      <th>Nama Peminjam</th>
                      <th>Nama Buku</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Kembali</th>
                      <th>Status</th>
                      <th>Kondisi Buku</th>
                      <th>Perpanjangan</th>
                    </tr>
                  </thead>
                  <tbody>
                {{-- @if ($peminjaman->count() > 0) --}}
                @foreach ($peminjaman as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->no_peminjaman }}</td>
                    <td>{{ $row->users->name }}</td>
                    <td>{{ $row->katalogs->title }}</td>
                    <td>{{ $row->tgl_pinjam }}</td>
                    <td>{{ $row->tgl_kembali }}</td>
                    <td>{{ $row->status->nama }}</td>
                    {{-- <td>{{ $row->kondisi->nama }}</td> --}}
                    <td>{{ $row->id_perpanjangan}}</td>
                </tr>
                @endforeach
                {{-- @endif --}}
            </table>
            <br>
            {{-- <p style="padding- left: 25px; text-align: justify; padding-right:25px; padding-bottom: 50px">Dinyatakan bebas dari segala peminjaman apapun di Perpustakaan Lembaga Pengembangan Teknologi Pedesaan. Demikian surat keterangan ini dibuat agar dapat digunakan sebagaimana mestinya.</p> --}}
            <div class="row">
                <div class="col-md-6">
                    <span style="float:left;">
                       Mengetahui,
                        <br> Ketua LPTP
                        <br>
                        <br>
                        <br>
                        <br> Ketua
                        <br> LPTP Surakarta
                    </span>
                </div>
                <div class="col-md-6">
                    <span style="float:right;">
                        Surakarta, {{ now()->isoFormat('D MMMM Y') }}
                        <br> Kepala Perpustakaan
                        <br>
                        <br>
                        <br>
                        <br> Petugas
                        <br> LPTP Surakarta
                    </span>
                </div>
            </div>
    </div>      

    
</body>
</html>

