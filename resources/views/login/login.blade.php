<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/png" href="{{url("awal/img/ami.jpg")}}">
    <title>Klinik</title>
    <style>
            body{
      font-family: sans-serif;
      background: #d5f0f3;
    }

    h1{
      text-align: center;
      font-weight: 300;
    }

    .tulisan_login{
      text-align: center;
      text-transform: uppercase;
    }

    .kotak_login{
      width: 350px;
      background: white;
      margin: 100px auto;
      padding: 30px 20px;
    }

    label{
      font-size: 11pt;
    }

    .form_login{
      box-sizing: border-box;
      width: 100%;
      padding: 10px;
      font-size: 11pt;
      margin-bottom: 20px;
    }

    .tombol_login{
      background: #46de4b;
      color: white;
      font-size: 11pt;
      width: 50%;
      border: none;
      border-radius: 3px;
      padding: 10px 20px;
      margin-left: 25%;
    }
    </style>
</head>
<body>
    <h1>Klinik</h1>
<div id="app">
    <div class="kotak_login">
        <p class="tulisan_login">Login </p>
        <form action="{{route('login')}}" method="post">
            {{ csrf_field() }}
            <label>Username</label><br>
            <input id="username" type="text" name="username" class="form_login" placeholder="username" required autofocus><br>   
                @if ($errors->has('username'))
                    <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            <label>Password</label><br>
            <input id="password" type="password" name="password" class="form_login" placeholder="Password" required><br>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            <input type="submit" class="tombol_login" value="LOGIN">
        </form>
    </div>
</div>
    <footer>
        <p align="right">copyright © 2019 Klinik. All rights reserved.
    </footer>
</body>
</html>