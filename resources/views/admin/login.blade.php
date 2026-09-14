<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('icons/site.ico') }}">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Administração</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: Arial, Helvetica, sans-serif;

            background: #eeeeee;
        }

        .login-box {
            width: 360px;

            background: #ffffff;

            border: 1px solid #cccccc;
            border-top: 4px solid #c50000;

            box-shadow: 0 2px 10px rgba(0,0,0,.15);
        }

        .header {
            padding: 18px 22px;

            border-bottom: 1px solid #dddddd;

            font-size: 18px;
            font-weight: bold;
        }

        .body {
            padding: 28px 22px;
        }

        .field {
            margin-bottom: 18px;
        }

        label {
            display: block;

            margin-bottom: 7px;

            font-size: 13px;
            font-weight: bold;

            color: #555;
        }

        input {
            width: 100%;

            padding: 10px;

            border: 1px solid #bcbcbc;

            outline: none;

            font-size: 14px;
        }

        input:focus {
            border-color: #777;
        }

        button {
            width: 100%;

            border: 0;

            padding: 11px;

            background: #444;
            color: #ffffff;

            cursor: pointer;

            font-size: 14px;
            font-weight: bold;
        }

        button:hover {
            background: #222;
        }

        .error {
            margin-bottom: 18px;

            padding: 10px;

            background: #fff0f0;

            border: 1px solid #e2aaaa;

            color: #9c0000;

            font-size: 13px;
        }

        .footer {
            padding: 12px 22px;

            background: #f7f7f7;

            border-top: 1px solid #dddddd;

            text-align: center;

            color: #888;

            font-size: 11px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <div class="header">
        Painel Administrativo
    </div>

    <div class="body">

        @if ($errors->any())

            <div class="error">
                {{ $errors->first() }}
            </div>

        @endif

        <form
            method="POST"
            action="{{ route('admin.login.submit') }}"
        >

            @csrf

            <div class="field">

                <label for="email">
                    Login
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                    autofocus
                >

            </div>

            <div class="field">

                <label for="password">
                    Senha
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    required
                >

            </div>

            <button type="submit">
                Entrar
            </button>

        </form>

    </div>

    <div class="footer">
        Área restrita
    </div>

</div>

</body>

</html>