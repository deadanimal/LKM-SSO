<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carian Tahunan </title>
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
    <div style="text-align: center; margin-bottom:15px;">
        Harga Purata Tahunan Biji Koko Bagi Pemborong yang dikeluarkan oleh Lembaga Koko Malaysia bagi tahun
        {{ $year_user }}
    </div>
    <table class="table table-bordered" style="width:80%; margin-left:auto;margin-right:auto; border:1px solid black; ">
        <thead>
            <tr>
                <th scope="col" rowspan="3" style="padding:1.5px; text-align:center">Pusat </th>
                <th scope="col" colspan="3" rowspan="2" style="padding:1.5px; text-align:center">Biji Koko
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
                    <td style="padding:1.5px; text-align:center">{{ $r->CentreDesc }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->BSH_High == 0 ? '-' : $r->BSH_High }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->BSH_Low == 0 ? '-' : $r->BSH_Low }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->BSH_Avg == 0 ? '-' : $r->BSH_Avg }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1A_High == 0 ? '-' : $r->SMC1A_High }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1A_Low == 0 ? '-' : $r->SMC1A_Low }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1A_Avg == 0 ? '-' : $r->SMC1A_Avg }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1B_High == 0 ? '-' : $r->SMC1B_High }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1B_Low == 0 ? '-' : $r->SMC1B_Low }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1B_Avg == 0 ? '-' : $r->SMC1B_Avg }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1C_High == 0 ? '-' : $r->SMC1C_High }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1C_Low == 0 ? '-' : $r->SMC1C_Low }}</td>
                    <td style="padding:1.5px; text-align:center">{{ $r->SMC1C_Avg == 0 ? '-' : $r->SMC1C_Avg }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <div style=" text-align:center; margin-bottom:15px;">
        Nota: * Tidak digred, TGG: Harga Tertinggi, RDH: Harga Terendah, PUR: Harga Purata
    </div>
</body>

</html>
