<?php
        //koneksi ke database
        $conn = mysqli_connect("localhost:3306", "nazwaad","ndivani15!", "praktikum11");

        //fungsi untuk mengambil data dari database
        function query($query){
            global $conn;
            $data = mysqli_query($conn, $query);
            $karyawans = [];
            while( $karyawan = mysqli_fetch_assoc($data) ) {
                $karyawans[] = $karyawan;
            }
            return $karyawans;
        }

        function tambah($data){
            global $conn;

            //$id = $data["id"];
            $name = $data["name"];
            $email = $data["email"];
            $address = $data["address"];
            $gender = $data["gender"];
            $position = $data["position"];
            $status = $data["status"];


            $query = "INSERT INTO karyawan
                    VALUES
                    ('','$name', '$email', '$address', '$gender', '$position', '$status')
                ";
            //menggunakan query untuk menambah data yaitu memerlukan parameter penghubung database dan query sql
            mysqli_query($conn, $query);
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }

        function update($data){
            global $conn;

            //$id = $data["id"];
            $name = $data["name"];
            $email = $data["email"];
            $address = $data["address"];
            $gender = $data["gender"];
            $position = $data["position"];
            $status = $data["status"];

            $result = mysqly_query
            ($mysqly,"UPDATE karyawan SET name='$name', email='$email', address='$address', gender='$gender', position='$position', status='$status', 
            WHERE id=$id");

            if(mysqly_query($conn,$result)){
                echo "data berhasil diupdate";

            }
            else {
                echo "ERROR! $sql.mysqly_error($conn)";
            }

            //menggunakan query untuk menambah data yaitu memerlukan parameter penghubung database dan query sql
            mysqli_query($conn, $query);
            header("location:index.php");
            return mysqli_affected_rows($conn);
        }


        function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM karyawan WHERE id = $id");
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }
?>