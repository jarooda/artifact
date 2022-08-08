<html>
<head>
<title>Administrator CMS Lokomedia</title>
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>
<link href="index.css" rel="stylesheet" type="text/css" />
</head>
<body id=bodiindex OnLoad="document.login.username.focus();">
<div>
  <div>
    <form name="login" action="cek_login.php" method="POST" onSubmit="return validasi(this)">
<table>
<tr  id=melayangsatu><td><input class="searchInput" type="text" name="username"width="100"></td></tr>
<tr  id=melayangdua><td><input class="searchInput" type="password" name="password"></td></tr>
<tr  id=melayangtiga><td colspan="2"><input class="searchSubmit" type="submit" value=""></td></tr>
</table>
</form>
  </div>
	<div id="footer">
			Copyright &copy; 2012 by Jalu Wibowo Aji. All Rights Reserved.
	</div>
</div>
</body>
</html>
