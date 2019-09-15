<?php include('includes/header.php'); ?>

<div id="about" class="view" style="height: 50%;background: url('img/2054.jpg')no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
	<div class="mask rgba-black-strong">
		<div class="container-fluid d-flex align-items-center justify-content-center h-100">
			<div class="row d-flex justify-content-center text-center">
				<div class="">
				<!-- Heading -->
				<a href=""><h1 class="white-text h1-responsive">Google Login</h1></a>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        document.getElementById("profileID").innerHTML = profile.getId(); // Don't send this directly to your server!
        document.getElementById("fullname").innerHTML = profile.getName();
        document.getElementById("firstname").innerHTML = profile.getGivenName();
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      };
    </script>
    <a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      alert('User signed out.');
    });
  }
</script>

<div>
	<label><b>ID:</b></label> <i id="profileID"></i>
	<label><b>Full Name:</b></label> <i id="fullname"></i>
	<label><b>First Name:</b></label> <i id="firstname"></i>
</div>

<?php include('includes/footer.php'); ?>