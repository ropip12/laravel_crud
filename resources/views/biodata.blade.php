<html>
<head>
    <title>biodata</title>
</head>
<body>
    Nama : rofiif <br>
    <tbody>
        @foreach ($anggota as $a)
        <tr>
            <td>{{$a->nim}}</td>
            <td>{{$a->nama}}</td>
        </tr>
        @endforeach
    </tbody>
</body>
</html>