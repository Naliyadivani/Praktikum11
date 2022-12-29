<?php
    require 'functions.php';
    $id = $_GET["id"];
    if(isset($_POST["submit"])) {
        if( isset($_POST["submit"])){
            //jika sudah ditekan dijalankan function tambah
            if(update($_POST) > 0) {
                echo "
                    <script>
                        alert('data berhasil diUpdate!');
                        document.location.href = 'index.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('data gagal diUpdate!');
                        document.location.href = 'index.php';
                    </script>
                ";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style type="text/css" media="screen">
        table {font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 11px;}
        input {font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 11px;height: 20px;}
        body{
            background-color: rgb(164, 220, 240);
            font-weight: bold;
        }
    </style>

</head>
<body>
    <?php
    $query ="SELECT * FROM karyawan";
    $data = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($data); 
    ?> 
    <div style="border:0; padding:10px; width:760px; height:auto;">
    
    <form action="index.php" method="POST"> 

    <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="80">
                        <td width="10%"> </td>
                        <td width="25%"> </td>
                        <td width="65%"><font color="black" size="5">Edit Data Karyawan</font></td>
                </tr>
                
                
                <tr height="46">
                    <td> </td>
                    <td>Nama</td>
                    <td><input type="text" name="name" id="name" size="50" maxlength="30" value="<?php echo $row['name']; ?>"/></td>
                </tr>
                
                <tr height="46">
                    <td> </td>
                    <td>Email</td>
                    <td><input type="text" name="email" id="email" size="50" maxlength="50" value="<?php echo $row['email']; ?>"/></td>
                
                <tr height="46">
                    <td> </td>
                    <td>Address</td>
                    <td><input type="text" name="address" id="address" size="50" maxlength="30" value="<?php echo $row['address']; ?>"/></td>
                </tr>
                
                <tr height="46">
                <td> </td>
                <td>Gender</td>
                <td><select name="gender">
                        <option value="Male">Male
                        <option value="Female">Female
                    </select></td>
                 </tr>

                <tr height="46">
                    <td> </td>
                    <td>position</td>
                    <td><input type="text" name="position" id="position" size="35" maxlength="10" value="<?php echo $row['position']; ?>"/></td>
                </tr>

                <tr height="46">
                <td> </td>
                <td>Status</td>
                <td><select name="status">
                        <option value="Fulltime">Fulltime
                        <option value="Parttime">Parttime
                    </select></td>
                 </tr>

                <tr height="46">
                    <td> </td>
                    <td> </td>
                    <td><button type="submit" name="submit">Update Data</button> 
                    <a href="index.php">Kembali</a>
                </tr>    
            
            </table>
        </form>
    </div>
</body>
</html>