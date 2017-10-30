<?php

$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$invalidEmail = "";

//if error=empty is in the URL do this
if (strpos($url, 'error=empty')!==false){
    echo "Please fill out all fields";

}

elseif (strpos($url, 'error=email')!==false){
    echo "This email is already used. Please enter another one";
}

elseif (strpos($url, 'error=invalidemail')!==false){
    $invalidEmail = "You must register with a City College email";
}

elseif (strpos($url, 'signup=success')!==false){
    echo "Congratulations, you have successfully registered. Please enter your username and password at the top of this page to login.";
}
?>

<html>
<style>
    .error {color: #FF0000;
        font-style: italic;
    }
</style>

<body>

<BR><BR><BR>

<h1 style="font-family: Tahoma;">Sign Up</h1>
<form action="includes/signup_inc.php" method="post"><br>
    <input placeholder="First Name" name="firstName" type="text"><br>
    <input placeholder="Last Name" name="lastName" type="text"><br>
    <input placeholder="Email" name="email" type="email">
    <span class="error"><?php echo $invalidEmail;?></span>
    <br>
    <input placeholder="Password" name="password" type="password"><br><br>

    <h4>Terms of service</h4><br>

    <textarea rows="25" cols="45" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a egestas massa. Donec aliquet id erat non finibus. Morbi elementum accumsan pretium. Sed rutrum viverra velit ut maximus. Mauris non magna porta, porta lacus ac, efficitur diam. Cras tempus ipsum vitae diam facilisis, ut rutrum nulla feugiat. Praesent interdum aliquet nunc, sit amet viverra mi faucibus sit amet. Suspendisse accumsan scelerisque semper. Donec pharetra metus vitae dui consequat iaculis. Integer et nunc vel quam hendrerit sollicitudin a at ante. Suspendisse semper interdum felis, eget mattis lacus. Proin enim metus, tincidunt congue mattis ut, egestas id nunc. Vivamus aliquam feugiat fringilla. Curabitur imperdiet euismod lacus sed pellentesque. Etiam tempor, turpis ut mattis iaculis, erat tortor rutrum lacus, nec maximus orci justo vitae leo.

        Nulla non porttitor eros. Cras erat ipsum, blandit vitae blandit sed, vulputate in nibh. Proin consequat, mi et viverra imperdiet, nisl nisl accumsan dolor, maximus gravida lorem arcu id risus. Sed dolor tellus, venenatis non posuere eu, convallis quis nisl. Pellentesque rutrum eu tortor quis pretium. Cras sit amet bibendum sapien. Duis porta malesuada dui, vel luctus nibh ultricies in. Integer sit amet egestas arcu, at hendrerit justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut porta justo. Donec sollicitudin lacus eu elit pretium, in semper nulla rhoncus. Sed molestie ultricies aliquet.

        Fusce at nunc sit amet erat dictum fringilla. Donec non nibh nec ligula pellentesque mollis sollicitudin a massa. Phasellus vestibulum felis eleifend ligula interdum molestie. Ut ante orci, tempor in tellus ac, luctus lacinia purus. Morbi nec quam sed turpis maximus porttitor non in dui. Nam congue dolor sit amet tellus rhoncus, nec elementum turpis convallis. Ut sem est, ornare at sapien et, vehicula venenatis erat. Aenean in ligula ac eros semper laoreet ac sed tellus. Nam aliquam nisl ut ipsum pretium, a tempus sapien tincidunt.

        Cras malesuada est dui, ac porttitor odio porta sed. In a orci nec lacus vestibulum pharetra non ut neque. Duis nunc odio, semper eget eleifend euismod, aliquam nec tellus. Fusce vitae hendrerit massa, at semper arcu. Etiam aliquam, lacus facilisis suscipit tincidunt, leo dolor mattis nulla, eget iaculis mauris justo nec nibh. Phasellus hendrerit condimentum risus, at fermentum quam pulvinar id. Suspendisse sagittis lacinia nisl. Interdum et malesuada fames ac ante ipsum primis in faucibus.
    </textarea><br>

    By clicking Sign Up, you agree to our Terms of Service <Br>and confirm that you have read our Data Policy,<br>including our Cookie Use Policy. <br>
    <button type="submit">Sign up</button>
</form>

<BR><BR><BR>

<form action='includes/login_inc.php' method='post'>
    <input placeholder="Email" name="email" type="email">
    <input placeholder='Password' name='password' type='password'>
    <button type='submit'>Log in</button>
</form>

</body>
</html>
