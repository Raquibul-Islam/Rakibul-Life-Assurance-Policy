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
    background-image: url("./uploads/abc.jpg"); 
    background-position: center;
    height: 100vh;
    width: 100%;
    position: relative;
  }

  .overlay{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);

  }

.container{
	width:1100px;
  margin: 2rem auto;	
  text-align: center;
}

.container h1{
  margin-top: 7rem;
  color:#FFFFFF;
}

  .form-title {
    text-align: center;
    color: #f2f2f2; 
    font-size: 24px;
    font-weight: bold;
    margin-top: 0;
    margin-bottom: 20px;
  }

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
  background: rgba(255, 255, 255, 0.0);
}
.form {
  padding-top: 30px;
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 349px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  background: rgba(255, 255, 255, 0.0);
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.3), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
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
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button,a {
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

a{
  text-align: right;
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
      <div class="container">
        <h1>Rakibul Life Assurance Policy</h1>
        <div class="login-page">
          <div class="form">
            <h2 class="form-title">Client Login</h2>
            <form class="login-form" action="Clogin.php" method="POST">
              <input type="text" name="username" id="" placeholder="username" />
              <input type="password" name="password" id="" placeholder="password" />
              <button>login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
