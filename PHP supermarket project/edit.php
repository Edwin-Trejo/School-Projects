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
  border:1px solid black;       /* css styles for the table*/
  border-radius: 5px;
  table-layout: fixed;
}
table{
border-radius: 5px;         /* css styles for the table*/
}
th {    
  background-color: #04AA6D;    /* css backgroung color*/
}
</style>


<body bgcolor="#DBF3F2"> <!-- css style for the background -->

<h1 style="color:green;"> Supermarket PLU list</h1>
   
     <?php 
     if(isset($_POST['button1'])){  //if button1 is clicked

         if ($_SESSION["namesList"] != "") {        //if the current position is not an empty string,then
             $_SESSION["namesList"] .= "<br>" ;     //concatenates the current string, jumps to the next line
         }
         if ($_SESSION["plusList"] != "") {         //if the current position is not an empty string, then
             $_SESSION["plusList"] .= "<br>" ;      //concatenates the current string, jumps to the next line
         }
         
          
         $_SESSION["namesList"] .= $_POST["itemName"] ; //assigns the itemName selected by the user to  the current array location.
         $_SESSION["plusList"] .= $_POST["itemPlu"] ;//assigns the itemPlu selected by the user to  the current array location.
     }
     else if(isset($_POST["upload"])){
         $target_dir = "/Classes/cs3360 Dr. Ward/etrejo9/";                         //directory where the image is going to be stored
         $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);    //directory where the image is uploaded
     }
     else {
         $_SESSION["namesList"] = "" ; //Initializes namesList if its not already initialized
         $_SESSION["plusList"] = "" ; //Initializes plusList if its not already initialized
     
     }  

 
  ?>
    <h4> Enter new item name and PLU down bellow (fill both blanks)</h4> 
    <form method="post">												<!-- creates action to input data  -->
        Item name: <input type="text" name="itemName" id="itemName" /> 	<!-- Gets user input as itemName -->
        PLU: <input type="text" name="itemPlu" id="itemPlu" /><br/>		<!-- Gets user input as itemPlu -->
        <input type="submit" name="button1" value="Submit"/>			<!-- creates submit button -->
         
     </form>
         
     <form action="edit.php" method="post" enctype="multipart/form-data">	<!-- creates action to upload image  -->
         Select image to upload:
         <input type="file" name="fileToUpload" id="fileToUpload">
         <input type="submit" value="Upload Image" name="upload">	<!-- creates upload button -->
     </form>
   
   
<!-- TABLE -->

<table style="background-color:#C5F8F5" style="width:100%">
  <tr>
    <th>Name</th>	<!-- Displays information for the table title -->
    <th>PLU</th>
    <th>Image(optional)</th>
    
  </tr>
  <tr>
  	<td>Apple(example)</td>		<!-- Displays information for the table example -->
  	<td>1015(example)</td>
  	<td><?php echo '<img src="/Classes/cs3360 Dr. Ward/etrejo9/apple.jpg">';?></td><!-- Displays image allocated in the server -->
  </tr>
  <tr>
	<td><?php echo  $_SESSION["namesList"];?> </td>		<!-- Displays user input -->
    <td><?php echo  $_SESSION["plusList"];?></td>
    <td><?php global $target_file;  echo '<img src="' .$target_file.'">'?> </td>	<!-- Displays image uploaded by user and allocated in the server -->
    
    
  </tr>

</table>

</body>
</html>