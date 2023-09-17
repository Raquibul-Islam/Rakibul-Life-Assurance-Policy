<?php
session_start();

if(isset($_SESSION["username"])){
	header("Location: home.php");
}
?>

<head>
<style>
  body{
    overflow: hidden;
  }
  .image-container {
    background-image: url("./uploads/hero-bg.jpg"); 
    background-size: cover;
    background-position: center;
    height: 100vh;
    width: 100%;
    position: relative;
  }

  .logo {
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 2;
    width: 150px;
    height: auto;
    background: rgba(255, 255, 255, 0.03);
  }

  .login-link {
    position:relative;
    bottom: 10px;
    right: 10px;
    color: #C7C1BD; 
    text-decoration: none;
    font-size: 14px;
    font-weight: bold;
  }

  .overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(2, 5, 0, 0.2);
  }
  
  .form-title {
    text-align: center;
    color: #C7C1BD; 
    font-size: 24px;
    font-weight: bold;
    margin-top: 0;
    margin-bottom: 20px;
  }

  .container-pt{
	  width: 1400px;
    margin: 2rem auto;	
  }

  .container-pt h1{
    margin-top: 7rem;
    color: #FFFFFF;
    margin-left: -18px;
  }

  .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
    float: left;
  }

  .form {
    padding-top: 30px;
    position: relative;
    z-index: 1;
    background: rgba(255, 255, 255, 0.1);
    max-width: 349px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }

  .form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #C7C1BD;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
  }

  .form button{
    margin-bottom: 1.5rem;
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #4CAF50;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
  }

  .form button:hover,.form button:active,.form button:focus {
    background: #43A047;
  }
</style>

<title>Login Page</title>
</head>
<body>
  <div class="image-container">
    <img src="./uploads/loggo.png" alt="Logo" class="logo">
    <div class="overlay">
      <div class="container-pt">
        <h1>Rakibul Life Assurance Policy</h1>
        <div class="login-page">
          <div class="form">
            <h2 class="form-title">Agent Login</h2>
            <form class="login-form" action="./Alogin.php" method="POST">
              <input type="text" name="username" id="" placeholder="username" />
              <input type="password" name="password" id="" placeholder="password" />
              <button>login</button>
              <a href="./cindx.php" class="login-link">Login for Client</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
