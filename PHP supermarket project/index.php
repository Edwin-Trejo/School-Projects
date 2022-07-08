<?php session_start(); //session start, all variables declared using session will keep its value until the session is over?> 
<html>
<title> PHP Assignment</title>
<head>
	<title>
	Supermarket PLU list
	</title>
</head>
<style>
table, th {
  border:1px solid black;   /* css styles for the table*/
  border-radius: 5px;
  table-layout: fixed;
}
table{
border-radius: 5px;     /* css styles for the table*/
}
th {
  background-color: #04AA6D;    /* css backgroung color*/
}
</style>


<body bgcolor="#DBF3F2">	

<h1 style="color:green;"> Supermarket PLU list</h1>    

  
  <br>
  <form method="post" action="index.php"name="signin-form">		<!-- creates form in which the username and password are shown -->
    <div class="form-element">
        <label>Username</label>	
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required /> (Enter any username)	<!-- username input -->
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required /> (Enter any Password)	<!-- password input -->
    </div>
    <input type="submit" name="login" value="Login"></input>	<!-- login button -->
</form>

     <?php if(isset($_POST['login'])) { //when login button is clicked displays manager options  ?>  
     	<h4> Manager options</h4>
		<a href = "edit.php">Edit list</a><br> 	<!-- link to index.php -->
    <?php }?>
     

<!-- TABLE -->

<table style="background-color:#C5F8F5" style="width:100%">
  <tr>
    <th>Name</th>			<!-- Displays information for the table title -->
    <th>PLU</th>
    <th>Image(optional)</th>
    
  </tr>
  <tr>
  	<td>Apple(example)</td>		<!-- Displays information for the table example -->
  	<td>1015(example)</td>
  	<td><?php echo '<img src="/Classes/cs3360 Dr. Ward/etrejo9/apple.jpg">';?></td>	<!-- Displays image allocated in the server -->
  	
  </tr>
  <tr>
	<td><?php echo  $_SESSION["namesList"];?> </td>		<!-- Displays user input -->
    <td><?php echo  $_SESSION["plusList"];?></td>
    <td><?php global $target_file;  echo '<img src="' .$target_file.'">'?> </td>	<!-- Displays image uploaded by user and allocated in the server -->
    
    
  </tr>

</table>

</body>
</html>