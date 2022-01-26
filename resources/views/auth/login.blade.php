<title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
          }
        
        body{
            font-family: 'lato', sans-serif;
            min-height: 100vh;
            background:url(images/bg4.jpg);
            background-attachment: fixed;
            background-size: 100% 100%;
        }
       
        .cont{
        position:absolute;
        width:100%;
        height:100%;
        overflow: hidden;
    }


    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 30px;
        box-shadow: 25px 0 25px;
        transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
        transition-delay: 0s;
        color: #333;
        z-index:9999;
        height: 70vh;
        width: 35%;
        background: rgba(0,0,0,.6);
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 5 10px;
    }
    .center input{
        width: 100%;
        padding: 0px 5px;
        margin: 10px 0px;
        border: none;
        color: #fff;
        outline: none;
        border-bottom: 2px solid #fff;
        background-color:transparent;
        

    }
    .center h2{
        color:#fff;
        letter-spacing:2px;
        text-transform: uppercase;
        padding:0px 5px;
    }
    .center button{
        border: 2px solid transparent;
        outline: none;
        width: 100%;
        padding: 14px 0;
        background-color: #7e87cf;
        color: #fff;
        letter-spacing:2px;
        text-transform: uppercase;
        font-size: 16px;
        font-weight:bold;
        margin-top: 20px;
        cursor:pointer;
        transition: 0.5s all;
    }

    .center button:hover{
        background-color: transparent;
        border: 2px solid #7e87cf;
        letter-spacing: 4px;
    }
    label{
        color:#fff;
        letter-spacing:2px;
        text-transform: uppercase;

    }

    .error{
        color: #fff;
    }

    .btn a{
        border: 2px solid transparent;
        outline: none;
        padding: 10px 14px;
        background-color: #7e87cf;
        color: #fff;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 12px;
        cursor: pointer;
        transition: 0.5s all;
        height: auto;
        position: absolute;
        top:  10px;
        border-radius: 3px;
    }    

    .btn:hover a{
        background-color: transparent;
        border: 2px solid #7e87cf;
        letter-spacing:  4px;
    }
    </style>

    <div class="btn"><a href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">Back</a></div>


<div class="cont">
            <div class="top"></div>
            <div class="bottom"></div>
            <div class="center">
            <div class="container">
                <h2>Sign In</h2>

        <div class="error">
        <x-jet-validation-errors class="mb-4" />
        </div>
        
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-white">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-xl text-blue-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <br>
                <a class="underline text-xl text-blue-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Not registered yet?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
                
                
                
            </div>
        </form>


