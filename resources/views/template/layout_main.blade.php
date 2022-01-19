<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JH Furniture</title>
    <style>
        * {
            margin: 0;
        }
        :root{
            --primary: #a748aa;
        }
    </style>
</head>

<body>
    @include('template.header')

    <div>
        @yield('content')
    </div>

    @include('template.flash_message')
</body>

</html>
