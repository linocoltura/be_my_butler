<?php

//    spl_autoload_register(function ($class) {
//        include_once("classes/" . $class . ".class.php");
//    });

// Include FB config file && User class
require_once 'fbConfig.php';
require_once 'classes/User.class.php';
include_once("classes/Db.class.php");

if(isset($accessToken)){

    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        header('Location: ./');
    }

    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    // Initialize User class
    $user = new User();

    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid' 	=> $fbUserProfile['id'],
        'first_name' 	=> $fbUserProfile['first_name'],
        'last_name' 	=> $fbUserProfile['last_name'],
        'email' 		=> $fbUserProfile['email'],
        'gender' 		=> $fbUserProfile['gender'],
        'locale' 		=> $fbUserProfile['locale'],
        'picture' 		=> $fbUserProfile['picture']['url'],
        'link' 			=> $fbUserProfile['link']
    );
    $userData = $user->checkUser($fbUserData);

    // Put user data into session
    $_SESSION['userData'] = $userData;

    // Get logout url
    $logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');

    // Render facebook profile data
    if(!empty($userData)){
        $output  = '<h1>Facebook Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

}else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

    // Render facebook login button
    //$output = '<a href="'.htmlspecialchars($loginURL).'"><img src="img/fblogin-btn.png"></a>';
}
?>


<!doctype HTML>
<html>
<head>
  <?php include 'includes/header.php' ?>
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.9&appId=142188329650523";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body>

<header>
    <nav class="nav navbar-default">
        <div class="container">

        </div>
    </nav>

</header>

<div class="container-fluid">

    <div class="container bg-overlay">

  <img src="img/logo.svg" alt="Splash_Logo" id="SplashLogo" class="img-responsive">
  <img src="img/SplashLogoKV.svg" alt="Splash_KV_Logo" id="SplashKV" class="img-responsive">
<div id="wrapper">
    <a id="facebooklink" href="<?php echo htmlspecialchars($loginURL) ?>">
        <div id="facebookbutton" class="fb-login-button" data-width="300" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true">
            </div>
        </a>
    </div>
</div>

<div class="wrapper">
</div>


</body>

</html>
