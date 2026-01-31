<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* From Uiverse.io by Yaya12085 */
        .form-container {
            width: 320px;
            border-radius: 0.75rem;
            background-color: rgba(17, 24, 39, 1);
            padding: 2rem;
            color: rgba(243, 244, 246, 1);
        }

        .title {
            text-align: center;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 700;
        }

        .form {
            margin-top: 1.5rem;
        }

        .input-group {
            margin-top: 0.25rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .input-group label {
            display: block;
            color: rgba(156, 163, 175, 1);
            margin-bottom: 4px;
        }

        .input-group input {
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid rgba(55, 65, 81, 1);
            outline: 0;
            background-color: rgba(17, 24, 39, 1);
            padding: 0.75rem 1rem;
            color: rgba(243, 244, 246, 1);
        }

        .input-group input:focus {
            border-color: rgba(167, 139, 250);
        }

        .forgot {
            display: flex;
            justify-content: flex-end;
            font-size: 0.75rem;
            line-height: 1rem;
            color: rgba(156, 163, 175, 1);
            margin: 8px 0 14px 0;
        }

        .forgot a,
        .signup a {
            color: rgba(243, 244, 246, 1);
            text-decoration: none;
            font-size: 14px;
        }

        .forgot a:hover,
        .signup a:hover {
            text-decoration: underline rgba(167, 139, 250, 1);
        }

        .sign {
            display: block;
            width: 100%;
            background-color: rgba(167, 139, 250, 1);
            padding: 0.75rem;
            text-align: center;
            color: rgba(17, 24, 39, 1);
            border: none;
            border-radius: 0.375rem;
            font-weight: 600;
        }

        .social-message {
            display: flex;
            align-items: center;
            padding-top: 1rem;
        }

        .line {
            height: 1px;
            flex: 1 1 0%;
            background-color: rgba(55, 65, 81, 1);
        }

        .social-message .message {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            color: rgba(156, 163, 175, 1);
        }

        .social-icons {
            display: flex;
            justify-content: center;
        }

        .social-icons .icon {
            border-radius: 0.125rem;
            padding: 0.75rem;
            border: none;
            background-color: transparent;
            margin-left: 8px;
        }

        .social-icons .icon svg {
            height: 1.25rem;
            width: 1.25rem;
            fill: #fff;
        }

        .signup {
            text-align: center;
            font-size: 0.75rem;
            line-height: 1rem;
            color: rgba(156, 163, 175, 1);
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(180deg, #f4f7fb, #eef6f4);
        }

        .form-container {
            width: 100%;
            max-width: 420px;
            border-radius: 12px;
            background-color: #fff;
            padding: 1.5rem;
            color: #111827;
            box-shadow: 0 6px 18px rgba(45, 55, 72, 0.08);
        }

        .title {
            text-align: center;
            font-size: 1.25rem;
            font-weight: 700;
        }

        .sign {
            width: 100%;
        }

        @media (max-width:480px) {
            .form-container {
                padding: 1rem;
                margin: 0 12px;
            }
        }
    </style>
</head>

<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="form-container">
            <p class="title">Login</p>
            <form class="form" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    <div class="d-flex justify-content-end mt-2">
                        <a class="small" href="#">Forgot password?</a>
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success sign" type="submit">Sign in</button>
                </div>
            </form>
            <p class="text-center mt-3 small">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>