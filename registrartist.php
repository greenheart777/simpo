<?php 
    require "db.php"
    ?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Sun Oct 27 2019 02:38:56 GMT+0000 (UTC)  -->
<html data-wf-page="5db3841daad4b5fb7de69724" data-wf-site="5db37393740d9c8f11f355a1">
<head>
    <?php 
                $data = $_POST;
                if(isset($data['do_signup']))
                  {
                    $errors = array();
                    if( trim($data['NameText'])=='')
                    {
                      $errors[] = 'Введите ФИО!';
                    }
                
                    if( trim($data['EmailText'])=='')
                    {
                      $errors[] = 'Введите Email!';
                    }
                
                    if( $data['PhoneText'] == '' )
                    {
                      $errors[] = 'Введите номер телефона!';
                    }
    
                   
                    if( R::count('users', "email= ?", array($data['EmailText']))>0 )
                    {
                      $errors[] = 'Пользователь с таким Email уже существует!';
                    }
                    if( R::count('users', "number= ?", array($data['PhoneText']))>0 )
                    {
                      $errors[] = 'Пользователь с таким номером уже существует!';
                    }
                
                    if(empty($errors))
                    {
                      $user = R::dispense('users');
                      $user->user = $data['NameText'];
                      $user->email = $data['EmailText'];
                      $user->number = $data['PhoneText'];
                      R::store($user);
                      echo '<div style = "color: green;">Вы успешно зарегистрированы!</div><hr>';
                    } else
                    {
                      echo '<div style = "color: red;">'.array_shift($errors).'</div><hr>';
                    }
                
                  }
        
                ?>
  <meta charset="utf-8">
  <title>RegistrArtist</title>
  <meta content="RegistrArtist" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/aytals-beautiful-project.webflow.css" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",
  ("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-2">
  <div class="section-3">
    <div class="container-4 w-container">
      <div class="form-block w-form">
        
                  
        <form action="/registrartist.php" method="POST" id="wf-form-Email-Form" name="wf-form-Email-Form" data-name="Email Form" class="form w-clearfix">
            <label for="NameText" class="field-label-4">Name</label>
            <input type="text" class="text-field-4 w-input" maxlength="256" name="NameText" data-name="NameText" id="NameText">
            <label for="EmailText" class="field-label-3">Email</label>
            <input type="email" class="text-field-3 w-input" maxlength="256" name="EmailText" data-name="EmailText" id="EmailText" required="">
            <label for="PhoneText" class="field-label-5">Phone</label>
            <input type="tel" class="text-field-5 w-input" maxlength="256" name="PhoneText" data-name="PhoneText" id="PhoneText" required="">
            <input type="submit" value="Отправить" data-wait="Please wait..." name="do_signup" class="submit-button w-button">
            <div>Thank you! Your submission has been received!</div>    
            </form>
            
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form.</div>
        </div>
      </div>
    </div>
  </div>
  <div data-collapse="all" data-animation="over-left" data-duration="300" data-doc-height="1" data-no-scroll="1" class="navbar-3 w-nav">
    <div class="container-6 w-container">
      <nav role="navigation" class="nav-menu-2 w-nav-menu">
        <div class="div-block-7 _1"><a href="index.html" class="nav-link-9 w-nav-link">Home</a></div>
        <div class="div-block-7 _2"><a href="registrartist.html" class="nav-link-10 _1 w-nav-link w--current">Ivent</a></div>
        <div class="div-block-7 _3"><a href="live-stram.html" class="nav-link-10 _2 w-nav-link">Live streams</a><a href="video.html" class="nav-link-10 _4 w-nav-link">Video RECORDING</a><a href="coming-stream.html" class="nav-link-10 _4 w-nav-link">COMING STREAMS</a></div>
      </nav>
      <div class="menu-button w-nav-button">
        <div class="icon w-icon-nav-menu"></div>
      </div><a href="#" class="brand-2 w-nav-brand"></a></div><a href="https://www.instagram.com/hack.simpu/" class="link-block-16 w-inline-block"></a></div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>