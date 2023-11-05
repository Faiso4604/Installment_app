{{-- <!DOCTYPE html> --}}
{{-- <html lang="en"> --}}

{{-- <head> --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css">
<style>
    :root {
        /* Light theme */
        --c-light-text: #333;
        --c-light-background: #dedede;
        --c-light-interactive: mediumvioletred;
        /* Dark Theme */
        --c-dark-text: #fff;
        --c-dark-background: #333;
        --c-dark-interactive: palegreen;
    }

    * {
        margin: 0;
        padding: 0;
        --transi: all 400ms;
        user-select: none;
        text-decoration: none;
    }

    /* Allows the body's children to grow to 100% of the viewport's height */
    html,
    body {
        height: 100%;
        overflow-x: hidden;
    }

    body {

        display: flex;
        flex-direction: column;
    }

    .theme-container {
        display: flex;

        flex-direction: column;

        align-items: center;

        /* Make the light theme the default */
        --c-text: var(--light-text);
        --c-background: var(--c-light-background);
        --c-interactive: var(--c-light-interactive);
        color: var(--c-text);
        background-color: var(--c-background);
    }


    .theme-container .cat {
        position: absolute;
        transition: var(--transi);
        opacity: .9;
        z-index: 1;
    }

    .dark-mode-checkbox:checked~.theme-container .msg {
        display: none;
    }

    .theme-container .msg {
        position: absolute;
        transition: var(--transi);
        z-index: 2;
        margin-top: 4rem;
        opacity: 0;
        animation: fade 5s 1.6s ease-in-out forwards;

    }

    .theme-container .cat:where(:hover, :focus, :active)~.msg {
        opacity: 1 !important;


    }

    @keyframes fade {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    .theme-container .msg p {
        position: relative;
        margin-left: 22rem;
        font-size: 2rem;
        background: rgb(6, 255, 218);
        border-radius: 12px;
        padding: 10px;
    }

    @media (max-width:646px) {
        .theme-container .msg p {
            margin-left: 16rem;
            font-size: 1.6rem;

        }

        .theme-container .msg {
            margin-top: 20%;

        }
    }

    .dark-mode-checkbox:checked~.theme-container .cat {
        display: none;

    }

    .theme-container .contact-con {
        transition: var(--transi);
        display: flex;
        flex-direction: column;
        margin: auto;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
        aspect-ratio: 1/1;
        width: 500px;
        box-shadow: 20px 20px 60px #acacac,
            -20px -20px 60px #ffffff;
        border: 1px solid #fff;
    }

    @media (max-width:501px) {
        .theme-container .contact-con {
            transition: var(--transi);
            border-radius: 0px !important;
        }

        .theme-container .msg p {
            margin-left: 0;
            font-size: 1.6rem;

        }

        .theme-container .msg {
            margin-top: 40%;
            transition: var(--transi);
        }

    }

    /* From uiverse.io by @alexruix */
    .input-group {
        position: relative;
    }

    .input {
        border: solid 1.5px #9e9e9e;
        border-radius: 1rem;
        background: none;
        padding: 1rem;
        font-size: 1rem;
        transition: var(--transi);
    }

    .first {
        margin-bottom: 1em;
        margin-top: 2em;
    }

    .user-label {
        position: absolute;
        left: 15px;
        color: var(--c-light-text);
        pointer-events: none;
        transform: translateY(1rem);
        transition: 350ms cubic-bezier(0.4, 0, 0.2, 1);
        transition-timing-function: ease-in-out;
    }

    .input:focus,
    input:valid {
        outline: none;
        border: 1.5px solid #000000;
    }

    .input:focus~label,
    input:valid~label {
        transform: translateY(-50%) scale(0.8);
        background-color: var(--c-background);
        padding: 0 .2em;
        color: #000000;
        text-transform: uppercase;
        letter-spacing: 1.3px;
    }

    /* From uiverse.io by @alexmaracinaru */
    .btn {
        margin-top: 1rem;
    }

    .cta {
        border: none;
        background: none;
    }

    .cta span,
    .contact p {
        padding-bottom: 7px;
        letter-spacing: 4px;
        font-size: 13px;
        padding-right: 15px;
        text-transform: uppercase;
    }

    .contact p {
        font-size: 1.2rem;
    }

    .cta svg {
        transform: translateX(-8px);
        transition: all 0.3s ease;
    }

    .cta:hover svg {
        transform: translateX(0);
    }

    .cta:active svg {
        transform: scale(0.9);
    }

    .hover-underline-animation {
        position: relative;
        color: black;
        padding-bottom: 20px;
    }

    .hover-underline-animation:after {
        content: "";
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 1.5px;
        bottom: 0;
        left: 0;
        background-color: #000000;
        transform-origin: bottom right;
        transition: transform 0.25s ease-out;
        transition: transform 0.25s ease-out, -webkit-transform 0.25s ease-out;
    }

    .cta:hover .hover-underline-animation:after {
        transform: scaleX(1);
        transform-origin: bottom left;
    }

    .dark-mode-checkbox:checked~.theme-container {
        transition: var(--transi);
        /* Override the default theme */
        --c-text: var(--c-dark-text);
        --c-background: var(--c-dark-background);
        --c-interactive: var(--c-dark-interactive);
        background: #05012a;
    }

    .dark-mode-checkbox~.theme-container .link {
        margin-top: 2rem;
        border: 1px solid;
        padding: 10px;
        border-radius: 10px;
        text-transform: uppercase;
    }

    .dark-mode-checkbox:checked~.theme-container .link a {
        color: cyan;
    }

    .dark-mode-checkbox~.theme-container .link a {
        color: var(--c-light-text);
    }

    .dark-mode-checkbox:checked~.theme-container .hover-underline-animation {
        color: #ffffff;
    }

    .dark-mode-checkbox:checked~.theme-container .hover-underline-animation:after {
        background: -webkit-gradient(linear, left top, right top, from(#0ff), to(#04faa4));
        background: linear-gradient(90deg, #0ff, #04faa4);
    }

    .dark-mode-checkbox:checked~.theme-container #arrow-horizontal {
        background: -webkit-gradient(linear, left top, right top, from(#0ff), to(#04faa4));
        background: linear-gradient(90deg, #0ff, #04faa4);
        border-radius: 5px;
    }

    .dark-mode-checkbox:checked~.theme-container .contact-con {
        border-radius: 60px;
        -webkit-box-shadow: 50px 50px 100px #020011,
            -50px -50px 100px #080243;
        box-shadow: 50px 50px 100px #020011,
            -50px -50px 100px #080243;
        border: 1px solid #05012d;
    }

    .dark-mode-checkbox:checked~.theme-container .input:focus,
    .dark-mode-checkbox:checked~.theme-container input:valid {
        border: 1.5px solid var(--c-text);
    }

    .dark-mode-checkbox:checked~.theme-container input {
        color: var(--c-text);
    }

    .dark-mode-checkbox:checked~.theme-container .input:focus~label,
    .dark-mode-checkbox:checked~.theme-container input:valid~label {
        background: #05012a;
        color: var(--c-text);
    }

    .dark-mode-label {
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
        border: 1px solid var(--c-light-text);
        padding: 5px;
    }

    a {
        color: var(--c-interactive);
    }

    .dark-mode-checkbox:checked~.theme-container .dark-mode-label::before {
        content: "\2611";
    }

    .visually-hidden {
        position: absolute;
        overflow: hidden;
        clip: rect(0 0 0 0);
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        border: 0;
        white-space: nowrap;
    }

    /* Grow the content Area */
    .grow {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        transition: var(--transi);
    }

    .footer footer {
        text-transform: uppercase;
        opacity: .7;
    }
</style>
{{-- </head> --}}

{{-- <body> --}}
{{-- <div class="container"> --}}
{{-- <input type="checkbox" id="dark-mode" class="dark-mode-checkbox visually-hidden"> --}}

{{-- <div class="theme-container grow">
        <label for="dark-mode" class="dark-mode-label">
            DARK MODE
        </label>


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="contact-con mt-5">
                <div class="contact">
                    <p>Sign in</p>
                    <form action="#" class="contact-form" autocomplete="off" method="">
                        <div class="input-group first">
                            <input id="email" required="" type="text" name="email"
                                class="input @error('email') is-invalid @enderror">
                            <label class="user-label">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" required class="input">
                            <label for="password" class="user-label">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                </div>
                <div class="btn">
                    <button class="cta" id="btn">
                        <span class="hover-underline-animation"> Login </span>
                        <svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10"
                            viewBox="0 0 46 16">
                            <path id="Path_10" data-name="Path 10"
                                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                                transform="translate(30)"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <!-- Content here END -->
    </div> --}}
{{-- </div> --}}
{{-- </body> --}}
{{-- <script> --}}
{{-- document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.querySelector('.dark-mode-checkbox');

        checkbox.checked = localStorage.getItem('darkMode') === 'true';

        checkbox.addEventListener('change', function(event) {
            localStorage.setItem('darkMode', event.currentTarget.checked);
        });

    }); --}}
{{-- </script> --}}
{{-- </html> --}}


<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Login Page | Pedro Reves</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .container p {
            font-size: 14px;
            line-height: 20px;
            letter-spacing: 0.3px;
            margin: 20px 0;
        }

        .container span {
            font-size: 12px;
        }

        .container a {
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin: 15px 0 10px;
        }

        .container button {
            background-color: #512da8;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }

        .container button.hidden {
            background-color: transparent;
            border-color: #fff;
        }

        .container form {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            height: 100%;
        }

        .container input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in {
            transform: translateX(100%);
        }

        .sign-up {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: move 0.6s;
        }

        @keyframes move {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            border: 1px solid #ccc;
            border-radius: 20%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
        }

        .toggle-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: all 0.6s ease-in-out;
            border-radius: 150px 0 0 100px;
            z-index: 1000;
        }

        .container.active .toggle-container {
            transform: translateX(-100%);
            border-radius: 0 150px 100px 0;
        }

        .toggle {
            background-color: #512da8;
            height: 100%;
            background: linear-gradient(to right, #5c6bc0, #512da8);
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .container.active .toggle {
            transform: translateX(50%);
        }

        .toggle-panel {
            position: absolute;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 30px;
            text-align: center;
            top: 0;
            transform: translateX(0);
            transition: all 0.6s ease-in-out;
        }

        .toggle-left {
            transform: translateX(-200%);
        }

        .container.active .toggle-left {
            transform: translateX(0);
        }

        .toggle-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .toggle-right {
            transform: translateX(200%);
        }
    </style>
</head>

<body>
    <div class="container" id="container">

        {{-- Admin-LOGIN Page --}}
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        {{ Session::get('success') }}
                        <span class="btn-close" data-bs-dismiss="alert" aria-label="Close"></span>
                    </div>
                @endif

                @if (Session::has('failure'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        {{ Session::get('failure') }}
                        <span class="btn-close" data-bs-dismiss="alert" aria-label="Close"></span>
                    </div>
                @endif

                <h1>Sign In</h1>
                <span>as Super-Admin/Admin</span>
                <div class="input-group first">
                    <input id="email" required="" type="email" name="email"
                        class="input @error('email') is-invalid @enderror">
                    <label class="user-label">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" name="password" required class="input">
                    <label for="password" class="user-label">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button>Sign In</button>
            </form>
        </div>

        {{-- Customer-LOGIN Page --}}
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h1>Sign In</h1>
                <span>as Super-Admin/Admin</span>
                <div class="input-group first">
                    <input id="email" required="" type="email" name="email"
                        class="input @error('email') is-invalid @enderror">
                    <label class="user-label">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group">
                    <input type="password" name="password" required class="input">
                    <label for="password" class="user-label">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <button>Sign In</button>
                <a href="{{ route('customer.show') }}" class="btn btn-outline-dark btn-sm">
                    <i data-feather="login"></i> Login As Customer
                </a>
            </form>
        </div>

        {{-- Toggle Button --}}
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Admin's Login</h1>
                    <p>Only Admin can login</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Customer Login</h1>
                    <p>Login as customer to view your items & installment data</p>
                    <button class="hidden" id="register">Sign In</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login')

    registerBtn.addEventListener('click', () => {
        container.classList.add('active');
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove('active');
    });
</script>
