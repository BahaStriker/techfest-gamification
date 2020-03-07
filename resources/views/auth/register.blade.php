<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>SlothLab | Modern Educational platform</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/vendors.css" rel="stylesheet">
    <link href="/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->

    <div id="login">
        <aside>
            <figure>
                <a href="/"><img src="img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
            </figure>
            <form autocomplete="off" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">

                    <span class="input">
                        <input id="name" type="text" class="input_field @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label class="input_label">
                            <span class="input__label-content">{{ __('Name') }}</span>
                        </label>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </span>

                    <span class="input">
                        <input id="email" type="email" class="input_field @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label class="input_label">
                            <span class="input__label-content">Your Email</span>
                        </label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </span>

                    <span class="input">
                        <input class="input_field @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" type="password" id="password1">
                        <label class="input_label">
                            <span class="input__label-content">Your password</span>

                        </label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </span>

                    <span class="input">
                        <input class="input_field" type="password" id="password2" name="password_confirmation" required
                            autocomplete="new-password">
                        <label class="input_label">
                            <span class="input__label-content">Confirm password</span>
                        </label>
                    </span>

                    <div id="pass-info" class="clearfix"></div>
                </div>
                <button type="submit" class="btn_1 rounded full-width add_top_30">Register</button>
                <div class="text-center add_top_10">Already have an acccount? <strong><a href="/">Sign In</a></strong>
                </div>
            </form>
            <div class="copy">© 2020 SlothLab</div>
        </aside>
    </div>
    <!-- /login -->

    <!-- COMMON SCRIPTS -->
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="/js/common_scripts.js"></script>
    <script src="/js/main.js"></script>
    <script src="/assets/validate.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="/js/pw_strenght.js"></script>

</body>

</html>
