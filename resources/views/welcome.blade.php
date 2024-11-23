<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css-rtl/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css-rtl/home.css') }}">
    </head>
    <body>
        <div class="home">
            <div class="home_content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="logo_area">
                                <x-application-logo></x-application-logo>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="page_content">
                                <div class="page_heading">
                                    <h2>الإدارة العامة للتعليم بمنطقة الجوف</h2>
                                    <h3>إدارة التعليم بمحافظة القريات </h3>
                                    <p>منصة اختبارات حيث يقوم المدرسين بلإنشاء الإختبارات لطلابهم مع توفير التصحيح الإلكتروني وعرض بيان الدرجات </p>
                                </div>
                                <div class="page_action">
                                    <a href="{{ route('login') }}" class="button-19">سجل كطالب</a>
                                    <a href="{{ route('teacher.login') }}" class="button-19">سجل كمدرس</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wave">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#0099ff" fill-opacity="1" d="M0,256L18.5,224C36.9,192,74,128,111,133.3C147.7,139,185,213,222,224C258.5,235,295,181,332,149.3C369.2,117,406,107,443,128C480,149,517,203,554,208C590.8,213,628,171,665,154.7C701.5,139,738,149,775,176C812.3,203,849,245,886,234.7C923.1,224,960,160,997,133.3C1033.8,107,1071,117,1108,154.7C1144.6,192,1182,256,1218,250.7C1255.4,245,1292,171,1329,170.7C1366.2,171,1403,245,1422,282.7L1440,320L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path>
                </svg>
            </div>
        </div>
    </body>
</html>
