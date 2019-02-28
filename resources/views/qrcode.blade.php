<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Qrcode') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/qr-code.png') }}" />
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <style>
        html,
        body {
            font-family: 'Athiti', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h4>{{ __('สแกน QR-code เพื่อบันทึกเวลาทำงาน') }}</h4>
                    </div>

                    <div class="card-body text-center">
                        {!! QrCode::size(250)->generate($qrcode) !!}
                    </div>
                </div>
                <br>
                <br>
                <a href="{{ url('/login') }}" class="btn btn-warning" style="font-size:14pt; font-weight:600;"><i
                        class="fas fa-hand-point-left"></i> {{ __('ย้อนกลับ') }}</a>
            </div>
        </div>
    </div>
</body>

</html>