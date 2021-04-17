<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Handling</title>
</head>
<body>
    <form action="{{ route('test.data') }}" method="post">
       @csrf
        Your Name:  <input type="text" name="name"><br>
        Your Number:  <input type="number" name="number"><br>
        <input type="submit" value="Save Data">

    </form>

</body>
</html>