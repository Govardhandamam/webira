<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home page</title>
</head>
<link rel="shortcut icon" href="my_icon.ico">
<link type="text/css" rel="stylesheet" href="style.css">
<?php require "checklogin.php"; ?>
<body>
<div id="header"> <div id="logo"></div></div>
<div class="login">
<div id="l_txt">Login</div>
<form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="login" method="post">
  <p>
  <label for="textfield">Name: </label>
  <input type="text" name="name" id="name" title="Enter Valid UserName" required value="<?php
	if(!$ErrMsg){ if(isset($_POST['name'])) { echo $_POST['name'];}}?>">
  </p>
  <p>
  <label for="password">Password: </label>
  <input type="password" name="password" id="password" title="Enter password" required>
  </p>
  <span class="error" style="font-size:14px;"><?php echo $ErrMsg;?></span>
  <p id="reset"><a href="reset.php">Forgot password??</a></p>
  <p>
  <input type="submit" name="login" id="submit" value="Login">
  </p>
</form>
</div>

<?php require "validate.php"; ?>
<div class="register">
<div id="text">SignUp</div>
<form id="signup" name="signup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <p>
    <label for="name">Name: </label>
    <input type="text" placeholder="Name" name="uname" title="Enter Valid UserName" autocomplete="off" required value=<?php
	if(!$success){ if(isset($_POST['uname'])) { echo $_POST['uname'];}}?>><span class="form_hint">Use your Nick name</span><span class="error"> <?php echo $nameErr;?></span>

    </p>
  <p>
      <label for="password">Password:</label>
      <input type="password" name="password" placeholder="Password" title="Enter password" autocomplete="off" required><span class="form_hint">Enter valid Password</span>
    </p>
    <div class="gender" id="gender"> 
      <label><input type="radio" name="gender" value="1"  required>
Male </label>
    <label><input type="radio" name="gender" value="2" required>
    Female</label>
    </div>
<div id="bday">Birthday!!</div>
<p>
    <select id="month" class="bmonth" name="bmonth" required>
    <option value="0">
        Month
    </option>
    <option value="01">
        January
    </option>
    <option value="02">
        Febraury
    </option>
    <option value="03">
        March
    </option>
    <option value="04">
        April
    </option>
    <option value="05">
        May
    </option>
    <option value="06">
        June
    </option>
    <option value="07">
        July
    </option>
    <option value="08">
        August
    </option>
    <option value="09">
        September
    </option>
    <option value="10">
        October
    </option>
    <option value="11">
        November
    </option>
    <option value="12">
        December
    </option>
</select>
<select id="day" class="bday" name="bday" required>
    <option selected="1" value="0">
        Day
    </option>
    <option value="01">
        1
    </option>
    <option value="02">
        2
    </option>
    <option value="03">
        3
    </option>
    <option value="04">
        4
    </option>
    <option value="05">
        5
    </option>
    <option value="06">
        6
    </option>
    <option value="07">
        7
    </option>
    <option value="08">
        8
    </option>
    <option value="09">
        9
    </option>
    <option value="10">
        10
    </option>
    <option value="11">
        11
    </option>
    <option value="12">
        12
    </option>
    <option value="13">
        13
    </option>
    <option value="14">
        14
    </option>
    <option value="15">
        15
    </option>
    <option value="16">
        16
    </option>
    <option value="17">
        17
    </option>
    <option value="18">
        18
    </option>
    <option value="19">
        19
    </option>
    <option value="20">
        20
    </option>
    <option value="21">
        21
    </option>
    <option value="22">
        22
    </option>
    <option value="23">
        23
    </option>
    <option value="24">
        24
    </option>
    <option value="25">
        25
    </option>
    <option value="26">
        26
    </option>
    <option value="27">
        27
    </option>
    <option value="28">
        28
    </option>
    <option value="29">
        29
    </option>
    <option value="30">
        30
    </option>
    <option value="31">
        31
    </option>
</select>
<select id="year" class="byear" name="byear" required>
    <option selected="1" value="0">
        Year
    </option>
     <option value="2014">
        2014
    </option>
    <option value="2013">
        2013
    </option>
    <option value="2012">
        2012
    </option>
    <option value="2011">
        2011
    </option>
    <option value="2010">
        2010
    </option>
    <option value="2009">
        2009
    </option>
    <option value="2008">
        2008
    </option>
    <option value="2007">
        2007
    </option>
    <option value="2006">
        2006
    </option>
    <option value="2005">
        2005
    </option>
    <option value="2004">
        2004
    </option>
    <option value="2003">
        2003
    </option>
    <option value="2002">
        2002
    </option>
    <option value="2001">
        2001
    </option>
    <option value="2000">
        2000
    </option>
    <option value="1999">
        1999
    </option>
    <option value="1998">
        1998
    </option>
    <option value="1997">
        1997
    </option>
    <option value="1996">
        1996
    </option>
    <option value="1995">
        1995
    </option>
    <option value="1994">
        1994
    </option>
    <option value="1993">
        1993
    </option>
    <option value="1992">
        1992
    </option>
    <option value="1991">
        1991
    </option>
    <option value="1990">
        1990
    </option>
    <option value="1989">
        1989
    </option>
    <option value="1988">
        1988
    </option>
    <option value="1987">
        1987
    </option>
    <option value="1986">
        1986
    </option>
    <option value="1985">
        1985
    </option>
    <option value="1984">
        1984
    </option>
    <option value="1983">
        1983
    </option>
    <option value="1982">
        1982
    </option>
    <option value="1981">
        1981
    </option>
    <option value="1980">
        1980
    </option>
    <option value="1979">
        1979
    </option>
    <option value="1978">
        1978
    </option>
    <option value="1977">
        1977
    </option>
    <option value="1976">
        1976
    </option>
    <option value="1975">
        1975
    </option>
    <option value="1974">
        1974
    </option>
    <option value="1973">
        1973
    </option>
    <option value="1972">
        1972
    </option>
    <option value="1971">
        1971
    </option>
    <option value="1970">
        1970
    </option>
    <option value="1969">
        1969
    </option>
    <option value="1968">
        1968
    </option>
    <option value="1967">
        1967
    </option>
    <option value="1966">
        1966
    </option>
    <option value="1965">
        1965
    </option>
    <option value="1964">
        1964
    </option>
    <option value="1963">
        1963
    </option>
    <option value="1962">
        1962
    </option>
    <option value="1961">
        1961
    </option>
    <option value="1960">
        1960
    </option>
    <option value="1959">
        1959
    </option>
    <option value="1958">
        1958
    </option>
    <option value="1957">
        1957
    </option>
    <option value="1956">
        1956
    </option>
    <option value="1955">
        1955
    </option>
    <option value="1954">
        1954
    </option>
    <option value="1953">
        1953
    </option>
    <option value="1952">
        1952
    </option>
    <option value="1951">
        1951
    </option>
    <option value="1950">
        1950
    </option>
</select> <span class="error"><img src="images/red_asterisk.png" draggable="false" style="-moz-user-select: none;"> <?php echo $dobErr;?></span>
  </p>
    <p>
      <label for="email">E-Mail:</label>
      <input type="email" placeholder="you@domain.com" name="email" title="Enter Valid E-mail Id!" autocomplete="off" required value=<?php
	if(!$success){ if(isset($_POST['email'])) { echo $_POST['email'];}}?>>
    <span class="form_hint">Format: "you@domain.com"</span>
    </p>
    
    <p>
      <label for="tel">Mobile:</label>
      <input type="tel" placeholder="9999999999" name="tel" id="tel" maxlength="20" pattern="[+]?([0-9]{10}|[0-9]{11}|[0-9]{12}|[0-9]{13})" title="Enter Valid Contact Number!" autocomplete="off" required value=<?php
	if(!$success){ if(isset($_POST['tel'])) { echo $_POST['tel'];}}?>><span class="form_hint">Ex: "9876543210"</span>
    </p>
    <p>
      <input type="submit" name="signup" id="submit" value="SignUp">
    </p>
</form>
</div>
</body>
</html>