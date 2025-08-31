<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Akagi eXperience</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    {{--
    -- Change this page later to main website --
    --}}

    <div id="div_top">
        <div>
            <p id="p_title">Akagi eXperience</p>
        </div>
        <div>
            <a href="/login" id="lnk_login">login</a>
        </div>
    </div>

    <img src="{{ asset('images/main/sigiriya_1.jpg') }}" alt="" id="img_background">

    <div id="div_content">
        <div>
            <img src="{{ asset('images/company/akagi_logo_6.png') }}" alt="" id="img_logo">
        </div>
        <div>
            <p id="p_welcome">
                Hi, welcome to
                <br>
                <strong>Akagi eXperience</strong>
            </p>
            <p>
                Our new tour management platform is currently under development.
                <br>
                <strong>Please check back soon!</strong>
            </p>
        </div>
    </div>

    <div id="div_footer">
        <p>
            © 2025 Akagi eXperience. All rights reserved.
            <br>
            powered by Akagi eXperience.
        </p>
    </div>
</body>
</html>
