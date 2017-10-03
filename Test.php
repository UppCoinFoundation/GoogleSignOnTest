<html itemscope itemtype="http://schema.org/Article">
<head>
<title>PHP Test</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="main.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
  </script>
  <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer>
  </script>
   <script>
    function start() {
      gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
          client_id: '148305129260-s1iu2gb98un9qheiuh6amed0jmvnmto8.apps.googleusercontent.com',
          // Scopes to request in addition to 'profile' and 'email'
          //scope: 'additional_scope'
        });
      });
    }
  </script>
 <body>
 	<!-- ... -->
  <button id="signinButton">Sign in with Google</button>
<script>
  $('#signinButton').click(function() {
    // signInCallback defined in step 6.
    auth2.grantOfflineAccess().then(signInCallback);
  });
  </script>
  <script>
function signInCallback(authResult) {
  if (authResult['code']) {

    // Hide the sign-in button now that the user is authorized, for example:
    $('#signinButton').attr('style', 'display: none');

    // Send the code to the server
    $.ajax({
      type: 'POST',
      url: 'http://localhost/storage',
      // Always include an `X-Requested-With` header in every AJAX request,
      // to protect against CSRF attacks.
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      contentType: 'application/octet-stream; charset=utf-8',
      success: function(result) {
        // Handle or verify the server response.
      },
      processData: false,
      data: authResult['code']
    });
  } else {
    // There was an error.
  }
}
</script>
<div id="errors"></div>
        <form id="enter_number">
            <p>Enter your phone number:</p>
            <p><input type="text" name="phone_number" id="phone_number" /></p>
            <p><input type="submit" name="submit" value="Verify" /></p>
        </form>
 
        <div id="verify_code" style="display: none;">
            <p>Calling you now.</p>
            <p>When prompted, enter the verification code:</p>
            <h1 id="verification_code"></h1>
            <p><strong id="status">Waiting...</strong></p>
        </div>
</script>
</body>
</html>
