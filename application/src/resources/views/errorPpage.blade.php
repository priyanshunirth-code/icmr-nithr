@extends('layouts.app')

@section('content')

<style>
    body {
      background-color: #f9f9f9;
      font-family: Arial, sans-serif;
    }

    .error-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 50px 20px;
      text-align: center;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .error-code {
      font-size: 100px;
      font-weight: bold;
      color: #f65454;
    }

    .error-message {
      font-size: 24px;
      margin-top: 10px;
    }

    .error-description {
      font-size: 16px;
      margin-top: 20px;
    }

    .btn-back {
      margin-top: 30px;
    }
  </style>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="error-container">
                      <!-- Replace 404 with your error code, e.g., 404, 500, etc. -->
                      <div class="error-code">404</div>
                      <div class="error-message">Oops! Something went wrong.</div>
                      <div class="error-description">
                        We are sorry, but the page you are looking for cannot be found.
                      </div>
                      <a  href="javascript:void(0);" onclick="goBack()" class="btn btn-primary btn-back">Go Back</a>
                      <!-- You can link the button to the homepage or another relevant page -->
                    </div>
                  </div>
            </div>
        </section>
    </main>
    <script>
        function goBack() {
          // Use the JavaScript history object to navigate back to the previous URL
          window.history.back();
        }
      </script>

@endsection
