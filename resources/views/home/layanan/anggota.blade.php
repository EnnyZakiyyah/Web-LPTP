<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keanggotaan</title>
    <style>
        body{
            background-color: #F6F6F6; 
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
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #060b42;
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
        .text-white{
            color: #fff;
        }
        .company-details{
            float: center;
            text-align: center;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }

        .body-image{
            padding: 2px;
            border: 1px solid gray;
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
                        <p class="text-white" ><h2 style="color:#fff !important">PERPUSTAKAAN</h2></p>
                        <p class="text-white" style="font-size: 14px">LEMBAGA PENGEMBANGAN TEKNOLOGI PEDESAAN</p>
                        <p class="text-white" style="font-size: 14px">SURAKARTA</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading" style="text-align: center">KARTU ANGGOTA</h3>
            <br>
            <div class="row">
                {{-- <div class="col-10"> --}}
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
                {{-- <div class="col-2">
                   
                    <img src="{{ $row->image_foto }}" style="width:60px; height:60px;" alt="">
                    <img src=" {{ public_path("storage/register-images" . $row->image_foto) }}" style="width:60px; height:60px;" alt="">
                </div> --}}
            {{-- </div> --}}
            
        </div>

        <div class="body-section mb-4">
            <div class="row">
            <p style="font-size: 10px"> - Kartu dibawa saat berkunjung ke perpustakaan </p>
            <p style="font-size: 10px"> - Maksimal peminjaman 1 minggu </p>
            <p style="font-size: 10px"> - Anggota harus mentaati aturan perpustakaan </p>
            <p style="font-size: 10px"> - Kartu berlaku selama 1 tahun </p>
            <span style="float:right">
                Surakarta, {{ now()->isoFormat('D MMMM Y') }}
               <br> Petugas
            </span>
            </div>
        </div>      
    </div>      

</body>
</html>