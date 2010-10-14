<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<form name="password" method="POST" action="<?php echo $PHP_SELF;?>"> 
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<p>California State University, Chico</p>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li><a href="http://www.ecst.csuchico.edu/BlitzBuild/index.html">Home</a></li>
			<li><a href="http://www.ecst.csuchico.edu/BlitzBuild/about.html">About</a></li>
			<li><a href="http://www.ecst.csuchico.edu/BlitzBuild/past.html">Past Builds</a></li>
			<li><a href="http://www.ecst.csuchico.edu/BlitzBuild/next.php">Future Builds</a></li>
			<li><a href="http://www.ecst.csuchico.edu/BlitzBuild/videos.html">Videos</a></li>
			<li><a href="http://www.ecst.csuchico.edu/BlitzBuild/contact.html">Contact</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
			<div class="post">
				<h2 class="title"><a href="#">Admin Login</a></h2>
				<div class="entry">
				<?php
					if(isset($_POST['login']))
					{
						$entered = $_POST['password'];						
											
						if(md5($entered) == '699daeec846df61067dd27c3b6c7a15a')
						{
							getAllUserInfo();
						}
						else
						{
							echo "<font color='red'>Incorrect Password</font><br />";
							getPassword();
						}
					}
					else
					{
						getPassword();
					}

					function getPassword()
					{
						echo "<input type='password' size='15' maxlength='15' name='password' value=''><br />";				
						echo "<input type='hidden' name='login' value='true'>";
					}	
					function getAllUserInfo()
					{
						
						$myconn = mysql_connect("db.ecst.csuchico.edu:5551", "mattben", "PASSWORD_NEEDED") or die ('Error connecting to mysql');
						mysql_select_db("blitzbuild",$myconn);

						$AUI = mysql_query("SELECT * FROM USERINFO") or die(mysql_error());
						echo "<table border='1' fram='box' rules='all' cellpadding='3' cellspacing='3'><td width='80'>First</td><td width = '40'>Middle</td><td width='80'>Last</td><td width='100'>Email</td><td width='500'>Skills</td></tr>";

						while($AUL = mysql_fetch_array($AUI, MYSQL_ASSOC))
						{				
							echo "<tr><td>$AUL[FNAME]</td><td>$AUL[MINT]</td><td>$AUL[LNAME]</td><td>$AUL[EMAIL]</td><td>$AUL[SKILL]</td></tr>";
						}
						echo"</table>";
					}		
				?>
				</div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">
		<p>Copyright (c) 2010 Chico State Blitz Build. All rights reserved. Design by <a href="http://www.ecst.csuchico.edu/cslug/">cslug</a>.</p>
	</div>
	<!-- end #footer -->
</body>
</html>
