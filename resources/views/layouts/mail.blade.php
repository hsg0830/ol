<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    html {
      font-size: 10px;
    }

    body {
      margin: 0;
      background-color: #eee5df;
      color: #231815;
      font-size: 1.6rem;
      font-family: "Noto Sans KR", sans-serif;
      line-height: 1.8;
    }

    @media screen and (min-width: 768px) {
      body {
        font-size: 1.9rem;
      }
    }

    img {
      max-width: 100%;
      height: auto;
      vertical-align: bottom;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    a:hover {
      opacity: 0.8;
    }

    *:focus {
      outline: none;
    }

    header {
      background-color: #6a421f;
      color: #ffffff;
      padding: 2rem;
      margin-bottom: 3rem;
    }

    #mail-main {
      max-width: 1400px;
      margin: 0 auto;
    }

    #mail-main .wrapper {
      background-color: #fffcf4;
      margin: 0 auto;
      padding: 2rem;
      border-radius: 1.5rem;
    }

    @media screen and (min-width: 768px) {
      #mail-main .wrapper {
        width: 70%;
      }
    }

    #mail-main .title {
      font-size: 3rem;
      font-weight: bold;
      color: #6a421f;
      text-align: center;
      padding: 2rem;
    }

    #mail-main .message {
      padding: 0 3rem;
    }

    #mail-main .sub-title {
      font-size: 2.5rem;
      text-align: center;
      color: #6a421f;
    }

    #mail-main .sub-title span {
      padding: 0 3rem 1rem;
      border-bottom: 2px solid #6a421f;
    }

    #mail-main table {
      width: 90%;
      margin: 0 auto;
    }

    #mail-main table th {
      width: 20%;
      color: #6a421f;
      padding: 1rem 0;
    }

    footer {
      margin-top: 3rem;
      background-color: #6a421f;
      color: #ffffff;
      padding: 1.5rem;
      text-align: center;
      font-size: small;
    }

  </style>
</head>

<body>
  <header>
    <a href="{{ url('/') }}">
      <img src="{{ asset('img/logo/logo_sp_white.png') }}" alt="얼 - 우리 말 배움터">
    </a>
  </header>

  <main id="mail-main">
    @yield('content')
  </main>

  <footer>
    조선대학교 조선문제연구쎈터 조선어연구실
  </footer>
</body>

</html>
