<?php
function koneksi()
{
   return mysqli_connect('localhost', 'root', '', 'pwd_2022');
}

function query($data)
{
   $con = koneksi();
   $result = mysqli_query($con, $data);
   $baris = [];
   while ($a = mysqli_fetch_assoc($result)) {
      $baris[] = $a;
   }
   return $baris;
}


function tambahData($tambah)
{
   $con = koneksi();

   $nim = htmlspecialchars($tambah['nim']);
   $nama = htmlspecialchars($tambah['nama']);
   $prodi = htmlspecialchars($tambah['prodi']);
   $foto = htmlspecialchars($tambah['foto']);

   $query = "INSERT INTO mahasiswa VALUES
   (null,
   '$nim',
   '$nama',
   '$prodi',
   '$foto'),";
   mysqli_query($con, $query);

   echo mysqli_error($con);

   return mysqli_affected_rows($con);

   //mysqli_affected_rows($con) = angka (0: gak ada data masuk, 1: ada data masuk)
}

function deleteData($id)
{
   $con = koneksi();
   $query = "DELETE FROM mahasiswa where id = $id";
   mysqli_query($con, $query);

   return mysqli_affected_rows($con);
}
function updateData($id)
{
   $con = koneksi();
   $query = mysqli_query($con, "SELECT * FROM mahasiswa where id = '" . $_GET['id'] . "';");


   mysqli_query($con, $query);

   return mysqli_affected_rows($con);
}
