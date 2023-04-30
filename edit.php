<?php
   include("config.php");
   include("firebaseRDB.php");

   $db = new firebaseRDB($databaseURL);
   $id = $_GET['id'];
   $retrieve = $db->retrieve("film/$id");
   $data = json_decode($retrieve, 1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        body{
            background-image: url("https://cdn.shopify.com/s/files/1/0035/9877/8435/files/ferrari-430-scuderia-spider-16m_2048x2048.jpg?v=1574801343");
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #form{
            background-color: transparent;
            width:50%;
            border-radius: 4px;
            margin: 250px auto;
            padding:50px;
        }

        @media screen and (max-width: 570px) {
            #form {
            width: 65%;
            margin-left:none;
            padding:40px;
            }
        }
    </style>
</head>
<body>
    <div id="form">
        <center><h1 style = "font-family : Calibri; font-size : 50px; color : white">Cars</h1></center>
         <a href="index.php"><button style = "font-size : 18px; background-color: red">Back</button></a><br><br>
   
         <form method="post" action="action_edit.php">

               <center><table style = "font-size : 22px; font-family : Calibri" border="0" width="200">
               <tr>
                  <td>Flavor</td>
                  <td>:</td>
                  <td><input style = "font-size : 18px; font-family : Calibri" type="text" name="title" value="<?php echo $data['title']?>"></td>
               </tr>
               <tr>
                  <td >Photo</td>
                  <td>:</td>
                  <td><input style = "font-size : 18px; font-family : Calibri" type="text" name="thumbnail" value="<?php echo $data['thumbnail']?>"></td>
               </tr>
               <tr>
                  <td >Price</td>
                  <td>:</td>
                  <td><input style = "font-size : 18px; font-family : Calibri" type="text" name="year" value="<?php echo $data['year']?>"></td>
               </tr>
               <tr>
                  <td >Size</td>
                  <td>:</td>
                  <td><input style = "font-size : 18px; font-family : Calibri" type="text" name="rating" value="<?php echo $data['rating']?>"></td>
               </tr>
            </table><br><br>
            <center><td>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input style = "font-size : 18px; background-color: red" type="submit" value="Save">
            </td></center>
         </form>
    </div>
</body>
</html>