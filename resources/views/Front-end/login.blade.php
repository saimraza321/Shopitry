<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   
    <link rel="stylesheet" href="style.css" />
    <title>Sign in / Sign up Form</title>
    <style>
      .home-button {
        position: fixed;
        top: 20px;
        width:5%;
        left: 20px;
        background-color: Black;
        color: white;
        border-radius: 50%;
        padding: 15px;
        text-align: center;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: all 0.5s ease;
        z-index: 1000;
        font-size: 18px;
      }

      /* Move to top-right when sign-up mode is active */
      .sign-up-mode .home-button {
        left: auto;
        right: 20px;
      }

      .home-button:hover {
        background-color:#d41738;
      }
    </style>
  </head>
  <body>
    <!-- Arrow Home Button -->
    <a href="/" class="home-button" id="homeButton" title="Go to Home">
      <i class="fas fa-arrow-left"></i>
    </a>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{route('signin')}}" method="POST" class="sign-in-form">
            @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fa-solid fa-user"></i>
              <input type="email" name="email" placeholder="email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

          @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
          @endif

          <form action="{{route('register')}}" class="sign-up-form" method="POST">
            @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="namee" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="passwordd" placeholder="Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Most welcome again...keep shopping
            </p>  
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="login.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Enter Details and register your self
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="reg.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <!-- Script to handle sign-up/sign-in mode toggle -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const signUpBtn = document.getElementById("sign-up-btn");
        const signInBtn = document.getElementById("sign-in-btn");
        const container = document.querySelector(".container");

        signUpBtn.addEventListener("click", () => {
          container.classList.add("sign-up-mode");
        });

        signInBtn.addEventListener("click", () => {
          container.classList.remove("sign-up-mode");
        });
      });
    </script>

    <script src="app.js"></script>
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
