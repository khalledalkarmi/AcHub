@extends('master')
@section('content')
    {{--    FIXME: fix layout--}}
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Custom Theme files -->
    <link href="assets/css/signup.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- //Custom Theme files -->
    <!-- main -->

    <div class="main-w3layouts wrapper">
        <h1>SignUp</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input class="text email" type="email" name="email" placeholder="email" required="">
                    <input class="text email" type="text" name="name" placeholder="Name" required="">
                    <input class="text email" type="password" name="password" placeholder="Password" required="">
                    <input class="text email" type="password" name="password_confirmation"
                           placeholder="Password Confirmation" required="">

                    <input type="submit" value="SIGNUP">
                </form>
                <p>Don't have an Account? <a href="{{ route('login') }}"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/"
                                                                               target="_blank">Colorlib</a>
            </p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
@endsection
