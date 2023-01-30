<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    <title>Trang chu @yield('title')</title>
</head>
<body>

    @include('client.block.header')
    <main class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-3 border">
                    <aside>
                        @section('sidebar')
                        @include('client.block.sidebar')
                        @show
                    </aside>
                </div>
                <div class="col-9 border">
                    <div class="content">
                        @yield('content')
                    </div>

                </div>
            </div>
        </div>
    </main>
    <!-- @include('client.block.footer') -->
</body>
</html>
