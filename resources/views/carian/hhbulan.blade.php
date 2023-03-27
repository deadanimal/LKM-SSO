<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carian Bulanan </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div style="text-align: center; margin-top:15px; margin-bottom:25px">
        {{-- Harga Koko pada tarikh {{ $tarikh_user }} --}}
        <img src={{ 'https://my.koko.gov.my/doc/wp-content/uploads/2021/12/Logo-LKM-8x8inch-720dpi.png' }} alt="Log o"
            width="100" height="100">
        <h4 style="font-weight:bold; margin-top:10px;">PERANGKAAN</h4>

    </div>
    <div style=" text-align:center; margin-bottom:15px;">
        Harga Purata Bulanan Biji Koko Bagi Pemborong yang dikeluarkan oleh Lembaga Koko Malaysia bagi bulan
        {{ $bulane }} {{ $tahun_user }}
    </div>
    <table class="table table-bordered" style="width:80%; margin-left:auto;margin-right:auto; border:1px solid black; ">
        <thead
            style="font-family: Arial, Helvetica, Sans-Serif; font-size: 12pt; font-weight:bold; background-color:#bdbdbd">
            <tr>
                <th scope="col" rowspan="3" style=" text-align:center">Pusat </th>
                <th scope="col" colspan="3" rowspan="2" style=" text-align:center">Biji Koko
                    Basah (Sen/Kg) </th>
                <th scope="col" colspan="9" style="padding:1.5px; text-align:center">Biji Koko Kering (RM/Tan)
                </th>
            </tr>
            <tr>
                <th scope="col" colspan="3" style="padding:1.5px; text-align:center">SMC 1</th>
                <th scope="col" colspan="3" style="padding:1.5px; text-align:center">SMC 2</th>
                <th scope="col" colspan="3" style="padding:1.5px; text-align:center">SMC 3</th>
            </tr>
            <tr>
                <th scope="col" style="padding:1.5px; text-align:center">TGG</th>
                <th scope="col" style="padding:1.5px; text-align:center">RDH</th>
                <th scope="col" style="padding:1.5px; text-align:center">PUR</th>
                <th scope="col" style="padding:1.5px; text-align:center">TGG</th>
                <th scope="col" style="padding:1.5px; text-align:center">RDH</th>
                <th scope="col" style="padding:1.5px; text-align:center">PUR</th>
                <th scope="col" style="padding:1.5px; text-align:center">TGG</th>
                <th scope="col" style="padding:1.5px; text-align:center">RDH</th>
                <th scope="col" style="padding:1.5px; text-align:center">PUR</th>
                <th scope="col" style="padding:1.5px; text-align:center">TGG</th>
                <th scope="col" style="padding:1.5px; text-align:center">RDH</th>
                <th scope="col" style="padding:1.5px; text-align:center">PUR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $r)
                <tr>
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    <td style="padding:1.5px; text-align:center">{{ $r->nama_pusat == 0 ? '-' : $r->nama_pusat }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->BSH_TGG == 0 ? '-' : $r->BSH_TGG }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->BSH_RDH == 0 ? '-' : $r->BSH_RDH }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->BSH_PUR == 0 ? '-' : $r->BSH_PUR }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1A_TGG == 0 ? '-' : $r->SMC1A_TGG }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1A_RDH == 0 ? '-' : $r->SMC1A_RDH }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1A_PUR == 0 ? '-' : $r->SMC1A_PUR }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1B_TGG == 0 ? '-' : $r->SMC1B_TGG }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1B_RDH == 0 ? '-' : $r->SMC1B_RDH }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1B_PUR == 0 ? '-' : $r->SMC1B_PUR }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1C_TGG == 0 ? '-' : $r->SMC1C_TGG }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1C_RDH == 0 ? '-' : $r->SMC1C_RDH }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1C_PUR == 0 ? '-' : $r->SMC1C_PUR }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <div style=" text-align:center; margin-bottom:15px;">
        Nota: * Tidak digred, TGG: Harga Tertinggi, RDH: Harga Terendah, PUR: Harga Purata
        <br>Harga biji koko premium dianggarkan di antara RM18.00 - RM22.00 sekilo bergantung kepada keperluan
        spesifikasi
        kilang coklat secara individu
    </div>
</body>

</html>
