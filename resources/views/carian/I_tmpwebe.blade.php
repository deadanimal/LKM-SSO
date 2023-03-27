<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carian Harian Koko Antarabangsa </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div style="text-align: center; margin-top:15px; margin-bottom:25px">
        {{-- Harga Koko pada tarikh {{ $tarikh_user }} --}}
        <img src={{ 'https://my.koko.gov.my/doc/wp-content/uploads/2021/12/Logo-LKM-8x8inch-720dpi.png' }} alt="Log o"
            width="100" height="100">
        <h4 style="font-weight:bold; margin-top:10px;">STATISTICS</h4>

    </div>
    <div style="text-align: center; margin-bottom:15px;">
        International Daily prices of cocoa beans on {{ $tarikh }}
    </div>
    <table class="table table-bordered" style="width:90%; margin-left:auto;margin-right:auto; border:1px solid black;">
        <thead>
            <th scope="col" style="text-align:center">Future Market </th>
            <th scope="col" style="text-align:center">High </th>
            <th scope="col" style="text-align:center">Low </th>
            <th scope="col" style="text-align:center">Close </th>
            <th scope="col" style="text-align:center">Future </th>
            <th scope="col" style="text-align:center">Exchange Rate</th>
            <th scope="col" style="text-align:center">Price Before </th>
        </thead>
        <tbody>
            @foreach ($result as $r)
                <tr>
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    <td style="text-align:center">{{ $r->CENTER }}</td>
                    <td style="text-align:center">{{ $r->HIGH == 0 ? '-' : $r->HIGH }}</td>
                    <td style="text-align:center">{{ $r->LOW == 0 ? '-' : $r->LOW }}</td>
                    <td style="text-align:center">{{ $r->AVE == 0 ? '-' : $r->AVE }}</td>
                    <td style="text-align:center">{{ $r->FUTURE == 0 ? '-' : $r->FUTURE }}</td>
                    <td style="text-align:center">{{ $r->EXRATE_STR == 0 ? '-' : $r->EXRATE_STR }}</td>
                    <td style="text-align:center">{{ $r->PCLOSE == 0 ? '-' : $r->PCLOSE }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
