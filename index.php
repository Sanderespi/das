<?php
include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
    <style>
        body{
            background-image: url("https://i.pinimg.com/736x/53/82/f6/5382f682a31a9a891b8d25683e288f59.jpg");
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
        table{
            border: 1;
            width: 85%;
        }
        td{
            text-align: center;
            vertical-align: center;
        }
        img{
            max-width: 150px;
        }
        
    </style>
</head>
<body>
    <div id="form">
        <center><h1 style = "font-family : Calibri; font-size : 50px; color : white">Cars</h1></center>
        <form name="form" action="add.php" onsubmit="return isvalid()" method="POST">
            <a href="add.php" ><button style = "font-size : 18px; background-color:red">Add</button></a><br><br>
            <center><table style = "font-size : 20px; font-family : Calibri" border="1" width="500">
            <tr align = "center" bgcolor = "grey" >
                <td><b>Picture</td>
                <td><b>Model</td>
                <td><b>Price</td>
                <td><b>Year</td>
                <td style="width:25%" colspan="2"><b>Action</td>
            </tr>
            <?php
            $data = $db->retrieve("film");
            $data = json_decode($data, 1);
            
            if(is_array($data)){
                foreach($data as $id => $film){
                    echo "<tr>
                    <td><img src='{$film['thumbnail']}'></td>
                    <td style = 'color : white'>{$film['title']}</td>
                    <td style = 'color : white' >{$film['year']}</td>
                    <td style = 'color : white'>{$film['rating']}</td>
                    <td style = 'color : white'><a href='edit.php?id=$id' class='btn btn-primary' role='button' >Edit</a></td>
                    <td style = 'color : white'><a href='delete.php?id=$id' class='btn btn-primary' role='button'>Delete</a></td>
                </tr>";
                }
            }
            ?>
            </table>
        </center>
        </form>
    </div>
</body>
</html>