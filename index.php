<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="css/materialize.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

  <title>InstaSam</title>
</head>
<body>

  <div class="page-layout">
    <header class="page-header">
      <div class="header-content content">
        <h1 class="page-header__heading">InstaSam</h1>
        <!-- <h2 id="heading_username">whoelsebutsam</h2> -->
        <h2><a class="modal-trigger" id="login-link" href="#login-modal">Login</a></h2>
      </div> 
    </header>

    <main class="main-page">
      <div id="posts-container" class="content posts-container">

      </div>
    </main>

    <footer class="page-footer">
        <div class="footer-content content">
          <form id="post-form" class="post-form">
              <input id="post-form-image_url" class="post-form__input" type="text" name="image-url" placeholder="Image URL">
              <input id="post-form-comment" class="post-form__input" type="text" name="comment" placeholder="Comment">
              <button class="post-form__button btn-flat">Post</button>
          </form>
        </div> 
    </footer>  
  </div>

    <div id="login-modal" class="modal">
      <div class="modal-content">
        <form id="login-signup-form">
            <input id="username" type="text" name="username" placeholder="username">
            <input id="password" type="password" name="password" placeholder="password">
        </form>
      </div>
      <div class="modal-footer">
        <a id="login-button" href="#!" class="modal-close waves-effect waves-green btn-flat">Login</a>
        <a id="signup-button" href="#!" class="modal-close waves-effect waves-green btn-flat">Sign Up</a>
      </div>
    </div>

    <div id="comments-modal" class="modal">
        <div class="modal-content">
          comments
        </div>
        
      </div>
    
  <script src="js/lib/jquery.js"></script>
  <script src="js/lib/materialize.min.js"></script>
  <script src="js/lib/moment.js"></script>

  <script src="js/elements.js"></script>
  <script src="js/networkRequests.js"></script>
  <script src="js/script.js"></script>
  
</body>
</html>