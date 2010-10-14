<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Future Builds</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<form name="new_game" method="POST" action="<?php echo $PHP_SELF;?>">

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
			<li class="current_page_item"><a href="http://www.ecst.csuchico.edu/BlitzBuild/next.php">Future Builds</a></li>
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
				<h2 class="title"><a href="#">What We Are Going To Do</a></h2>
				<div class="entry">
				<p>Blitz Build 2011</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>				
				<li>
					<h2>Next Meeting</h2>
					<p>10/6/10 | 5:30pm | OCNL 237 | <a href="http://www.ecst.csuchico.edu/cslug/">cslug</a></p>
				</li>
				<li>
					<h2>Get Involved</h2>
					<ul>
					<?php
						function form($Name, $Email, $Skills, $blankfname, $blanklname, $blankemail)
						{
							echo "<li>First Name: <input type='text' size='15' maxlength='32' name='fName' value='$fName'>";
							if($blankfname != "")
							{
								echo "<br /><font color='red'>Can Not Be Blank</font></li>";
							}
							else { echo "</li>"; }
							
							echo "<li>Middle Intital: <input type='text' size='1' maxlength='1' name='mi' value='$mi'>";
							
							echo "<li>Last Name: <input type='text' size='15' maxlength='32' name='lName' value='$lName'>";
							if($blanklname != "")
							{
								echo "<br /><font color='red'>Can Not Be Blank</font></li>";
							}
							else { echo "</li>"; }
							
							echo "<li>Email: <input type='text' size='18' maxlength='50' name='Email' value='$Email'>";
							if($blankemail != "")
							{
								echo "<font color='red'>Can Not Be Blank</font></li>";
							}
							else {echo "</li>"; }
							echo "<li>Skills: <input type='text' size='18' maxlength='256' name='Skills' value='$Skills'><br />ex. framing, concert, finical backing...</li>";
							echo "<li><input type='submit' value='Submit Info' name='submit'></li>";
							echo "<input type='hidden' name='flag' value='true'>";
						}	
						
						if(isset($_POST['flag']))
						{
							$fName = $_POST['fName'];
							$mi = $_POST['mi'];
							$lName = $_POST['lName'];
							$Email = $_POST['Email'];
							$Skills = $_POST['Skills'];
								
							if (empty($fName))
							{
								$fName="";
								$NameError=false;
								$blankfname="a";
							}
							else{$NameError=true;}
							if (empty($lName))
							{
								$lName="";
								$NameError=false;
								$blanklname="a";
							}
							else{$NameError=true;}
							if(empty($Email))
							{	
								$Email="";
								$EmailError=false;
								$blankemail="a";
							}
							else{$EmailError=true;}
						}	
										
						if($NameError == true && $EmailError == true)
						{
							/*$myFile = "signups.txt";
							$fh = fopen($myFile, 'a') or die("can't open file");
							$stringData = "$Name|$Email|$Skills\n";
							fwrite($fh, $stringData);
							fclose($fh);
							*/
							$myconn = mysql_connect("db.ecst.csuchico.edu:5551", "mattben", "PASSWORD_NEEDED") or die ('Error connecting to mysql');
							mysql_select_db("blitzbuild",$myconn);

							$check = mysql_query("SELECT * FROM USERINFO WHERE EMAIL = '$Email'");
							$check = mysql_fetch_row($check);
							if($check == null)
							{
								$inserting = mysql_query("INSERT INTO USERINFO(FNAME, MINT, LNAME, EMAIL, SKILL) VALUES('$fName', '$mi', '$lName', '$Email', '$Skills')")or die(mysql_error());
								echo" <li><font color='red'>Thank you, we have saved your info</font></li>";								
							}
							else
							{
								echo" <li><font color='red'>This Email is already in our system</font></li>";								
							}
						}			
						else
						{
							form($Name, $Email, $Skills, $blankname, $blankemail);
						}
					?>
					</ul>
				</li>				
			</ul>
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
