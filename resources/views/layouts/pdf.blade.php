<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PDF | Administrator Module - </title>

    <style media="screen">

      body{
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
        padding-top: 25px;
        padding-bottom: 25px;
      }

      a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
      }

      .h4, h4 {
        font-size: 1.5rem;
      }

      .container{
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
        box-sizing: border-box;
        display: block;
      }

      .card{
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
      }

      .card-header{
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, .03);
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
      }

      .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
      }

      .card-footer {
        padding: .75rem 1.25rem;
        background-color: rgba(0, 0, 0, .03);
        border-top: 1px solid rgba(0, 0, 0, .125);
      }

      .font-weight-bold {
        font-weight: 700 !important;
      }

      .text-danger {
        color: #dc3545 !important;
      }

      .text-success {
        color: #28a745 !important;
      }

      .text-muted {
        color: #6c757d !important;
      }

      .col-md-3, .col-sm-6{
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
      }

      .product{
        margin-top: 50px;
        margin-bottom: 50px;
      }

    </style>

  </head>
  <body>

    <div class="container">
      @yield('content')
    </div>

  </body>
</html>
