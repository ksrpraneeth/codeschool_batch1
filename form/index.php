
<!DOCTYPE html>
<html>
<head>
<title>Form Validation with PHP - Demo Preview</title>
<meta content="noindex, nofollow" name="robots">
<link href="style.css" rel="stylesheet">
</head>
<body>
<div class="maindiv">
<div class="form_div">
<div class="title">
<h2>Form Validation with PHP.</h2>
</div>
<form action="validation.php" method="post">
<h2>Form</h2>
<span class="error">* required field.</span>
Name:
<input class="input" name="name" type="text" value="">
<span class="error">* <?php echo $nameError;?></span>
E-mail:
<input class="input" name="email" type="text" value="">
<span class="error">* <?php echo $emailError;?></span>
Gender:
<input class="radio" name="gender" type="radio" value="female">Female
<input class="radio" name="gender" type="radio" value="male">Male
<span class="error">*<?php echo $genderError;?></span>
Website:
<input class="input" name="website" type="text" value="">
<span class="error"><?php echo $websiteError;?></span>
Comment:
<textarea cols="40" name="comment" rows="5">
</textarea>
<input class="submit" name="submit" type="submit" value="Submit">
</form>
</div>
</body>
</html>