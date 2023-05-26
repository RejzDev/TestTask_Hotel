<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel logo</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header-line">
                <a href="tel:+38 (044) 299 27 66" class="header-phone">+38 (044) 299 27 66</a>
                <div class="header-logo">Hotel Logo</div>
                <div class="header-button">ЗАБРОНЮВАТИ</div>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <div class="block-text">
                <div class="text-1">Забронюйте</div>
                <div class="text-2">Своє місце</div>

            </div>

            <div class="elips"></div>
            <div class="logo-text">в Hotel Logo</div>

            <form action="{{route('saveReservation')}}" method="post">
                @csrf

                <div class="form">
                    <div class="date-inc @error('date_first') error @enderror">
                        <p>Дата заїзду</p>
                        <input type="text" name="date_first" id="datepicker" class="date-1 ">
                        @error('date_first')
                        <div class=" alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="date-out @error('date_second') error @enderror">
                        <p>Дата виїзду</p>
                        <input type="text" name="date_second" id="datepicker1" class="date-1">
                        @error('date_second')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-number @error('phone') error @enderror">
                        <p>номер телефону</p>
                        <input type="text" name="phone">
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-email @error('email') error @enderror">
                        <p>e-mail</p>
                        <input type="text" name="email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="button-submit">
                    <button class="button" id="but" type="submit">Забронювати</button>

                </div>
            </form>
            <div class="small-block-text">
                <div class="small-text-1">Історія</div>
                <div class="small-text-2">Бронювань</div>

            </div>

            <div class="small-elips"></div>
            <div class="small-logo-text">ваших</div>

        </div>


        <div class="container">
            <div class="table-stack">
                <div class="stack">дата заїзду, з</div>
                <div class="stack">дата виїзду, до</div>
                <div class="stack">статус</div>
                <div class="stack">видалити бронювання</div>
            </div>
        </div>
        <div class="table-line">

            @if(!is_null(\Illuminate\Support\Facades\Session::get('reservations')))
                @foreach(\Illuminate\Support\Facades\Session::get('reservations') as $reservation )
                    <div class="inform-line">
                        <div class="text-inform-line">{{$reservation['date_first']}}</div>
                        <div class="text-inform-line">{{$reservation['date_second']}}</div>
                        <div class="text-inform-line status">Успішно</div>
                        <div class="text-inform-line"><a
                                href="{{route('removeReservation', [$reservation['id'], $loop->index])}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                                    <path fill="#AE8B70" d="M18.339 2.878h-4.161V2.2c0-1.213-.987-2.2-2.2-2.2H8.022c-1.213 0-2.2.987-2.2
                         2.2v.678h-4.16a.553.553 0 0 0-.556.555c0 .309.247.555.555.555h1.003v13.043A2.973 2.973 0 0 0 5.634
                         20h8.733a2.973 2.973 0 0 0 2.968-2.969V3.988h1.004a.553.553 0 0 0 .555-.555.553.553 0 0
                          0-.555-.555ZM6.933 2.2c0-.6.489-1.09 1.09-1.09h3.955c.6 0 1.09.49 1.09 1.09v.678H6.932V2.2Zm9.292
                          14.831a1.862 1.862 0 0 1-1.858 1.859H5.633a1.862 1.862 0 0 1-1.858-1.859V3.988h12.454v13.043h-.004Z"/>
                                    <path fill="#AE8B70"
                                          d="M10 16.9a.553.553 0 0 0 .555-.555V6.534A.553.553 0 0 0 10 5.979a.553.553 0 0 0-.555.555v9.806c0 .309.247.56.555.56ZM6.377 16.287a.553.553 0 0 0 .556-.555v-8.59a.553.553 0 0 0-.556-.555.553.553 0 0 0-.555.555v8.59c0 .308.251.555.555.555ZM13.623 16.287a.553.553 0 0 0 .555-.555v-8.59a.553.553 0 0 0-.556-.555.553.553 0 0 0-.555.555v8.59c0 .308.247.555.556.555Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">Hotel Logo</div>
                <div class="footer-button">ЗАБРОНЮВАТИ</div>
                <div class="footer-phone">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none">
                            <path fill="#fff" d="M13.619 10.275 11.665 8.32c-.698-.698-1.884-.419-2.163.488-.21.628-.907.977-1.535.838-1.396-.35-3.28-2.163-3.628-3.629-.21-.628.209-1.326.837-1.535.907-.279 1.186-1.465.488-2.163L3.711.366c-.559-.488-1.396-.488-1.884 0L.5 1.692C-.825
                3.088.64 6.786 3.92 10.065c3.28 3.28 6.978 4.815 8.373 3.42l1.326-1.326c.488-.559.488-1.396 0-1.884Z"/>
                        </svg>
                        <a href="tel:+38 (044) 299 27 66">+38 (044) 299 27 66</a>
                    </p>
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none">
                            <path fill="#fff" d="M13.619 10.275 11.665 8.32c-.698-.698-1.884-.419-2.163.488-.21.628-.907.977-1.535.838-1.396-.35-3.28-2.163-3.628-3.629-.21-.628.209-1.326.837-1.535.907-.279 1.186-1.465.488-2.163L3.711.366c-.559-.488-1.396-.488-1.884 0L.5 1.692C-.825
                3.088.64 6.786 3.92 10.065c3.28 3.28 6.978 4.815 8.373 3.42l1.326-1.326c.488-.559.488-1.396 0-1.884Z"/>
                        </svg>
                        <a href="tel:+38 (044) 299 27 66">+38 (044) 299 27 66</a>
                    </p>
                    <p class="adr">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" fill="none">
                            <path fill="#fff" d="M6.177.003A5.005 5.005 0 0 0 .999 5.005c0 3.202 3.073 5.526 4.795
                        8.868.087.17.332.17.42 0 1.557-3.007 4.22-5.024 4.714-7.92.511-2.999-1.712-5.848-4.751-5.95Zm-.174
                        7.623a2.622 2.622 0 1 1 0-5.243 2.622 2.622 0 0 1 0 5.243Z"/>
                        </svg>
                        <a href="tel:+38 (044) 299 27 66" class="adr adress-footer">пр-т. В. Лобановського 25/16 Київ,
                            Україна</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

@vite('resources/js/app.js')
</body>
</html>
