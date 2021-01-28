<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Show time:
<form action="{{ route('get-time-location') }}" method="get">
    <select name="time_zone" id="">
        <option value="Asia/_Singapore">Viet Nam</option>
        <option value="Japan">Nhat ban</option>
        <option value="America/_Adak">My</option>
    </select>
    <button type="submit">Result</button>
</form>
</body>
</html>
