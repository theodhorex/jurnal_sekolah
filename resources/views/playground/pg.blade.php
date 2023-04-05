<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('gravatar_jquery/css/gravatar.css') }}">
    <title>Document</title>
</head>
<body>
    <img data-name="Theo" data-char-count="2" data-font-size="45" data-seed="600" data-color="#85e0ce" class="profile"/>
    
    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('initial/initial.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.profile').initial();
        });
    </script>
</body>
</html>