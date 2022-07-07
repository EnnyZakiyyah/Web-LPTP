<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebas Pustaka</title>
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
            <h3 class="heading" style="text-align: center">SURAT KETERANGAN BEBAS PERPUSTAKAAN</h3>
            <br>
            <p style="padding-left: 25px; text-align: justify; padding-right:25px;">Yang bertanda tangan di bawah ini, Petugas Perpustakaan Lembaga Pengembangan Teknologi Pedesaan menerangkan bahwa anggota :</p>
            <br>
            @foreach ($data as $row)
            <p style="padding-left: 50px">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $row->name }}</p>
            <p style="padding-left: 50px">No. Anggota		: {{ $row->no_ktp }}</p>
            @endforeach
            <br>
            <p style="padding-left: 25px; text-align: justify; padding-right:25px; padding-bottom: 50px">Dinyatakan bebas dari segala peminjaman apapun di Perpustakaan Lembaga Pengembangan Teknologi Pedesaan. Demikian surat keterangan ini dibuat agar dapat digunakan sebagaimana mestinya.</p>
            <span style="float:right; padding-right:25px;">
                Surakarta, {{ now()->isoFormat('D MMMM Y') }}
                <br>
                <br>
                <br>
                <br> Petugas Perpustakaan
                <br> Lembaga Pengembangan Teknologi Pedesaan
            </span>
            {{-- <div class="row">
                <div class="col-10">
                    <table>
                        @foreach ($data as $row)
                        <tr>
                            <td><h4">No. Anggota</h4></td>
                            <td><h4">:</h4></td>
                            <td><h4 >{{ $row->no_ktp }}</h4></td>
                        </tr>
                        <tr>
                            <td><h4">Nama</h4></td>
                            <td><h4">:</h4></td>
                            <td><h4>{{ $row->name }}</h4></td>
                          </tr>
                          <tr>
                              <td><h4">Jenis Kelamin</h4></td>
                              <td><h4">:</h4></td>
                              <td><h4">{{ $row->jk }}</h4></td>
                            </tr>
                            <tr>
                                <td><h4">Tempat Lahir</h4></td>
                                <td><h4">:</h4></td>
                                <td><h4">{{ $row->tempat_lahir }}</h4></td>
                            </tr>
                            <tr>
                                <td><h4">Tanggal Lahir</h4></td>
                                <td><h4">:</h4></td>
                                <td><h4">{{ $row->tgl_lahir }}</h4></td>
                            </tr>
                            <tr>
                                <td><h4">Alamat</h4></td>
                                <td><h4">:</h4></td>
                                <td><h4">{{ $row->alamat }}</h4></td>
                            </tr>
                            @endforeach
                    </table>
                </div>
                <div class="col-2">
                    <img src="{{ $row->image_foto }}" style="width:60px; height:60px;" alt="">
                </div>
            </div>
            
        </div>

        <div class="body-section mb-4">
            <div class="row">
            <p style="font-size: 10px"> - Kartu dibawa saat berkunjung ke perpustakaan </p>
            <p style="font-size: 10px"> - Maksimal peminjaman 1 minggu </p>
            <p style="font-size: 10px"> - Anggota harus mentaati aturan perpustakaan </p>
            <p style="font-size: 10px"> - Kartu berlaku selama 1 tahun </p>
            <span style="float:right">
                Surakarta, {{ now()->toDateString() }}
               <br> Petugas
            </span>
            </div>
        </div>       --}}
    </div>      

</body>
</html>