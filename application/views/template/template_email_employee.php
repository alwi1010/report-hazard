<!DOCTYPE html>
<html lang="id">
	<head>
		<title>SISTEM PAPERDONE - BANDARA INTERNASIONAL I GUSTI NGURAH RAI</title>
    <meta charset="utf-8">
    <meta name="Description" content="HAZARD">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
body{
  margin: 0;
  background-color: #f2f2f2;
}

.table {
  width: 90%;
  margin-left: 5%;
  margin-bottom: 50px;
}

p{
  font-size: 120%;
}

.header{
  width: 100%;
  height: 50px;
  background-color: rgba(0, 155, 224, 0.6);
  margin-bottom: 50px;
}

.footer{
  width: 100%;
  height: 39px;
  color: white;
  background-color: #4F9E19;
  font-size: 14px;
  text-align: center;
  padding-top: 23px;
  margin-top: 10px;
}
    </style>
  </head>

  <body>
    <div class="header"><img src="<?php echo base_url().'asset/images/logo_jadi.webp' ?>" alt="Logo Ngurah Rai" style="height: 50px;"></div>
    <div>
      <center>
        <p><b>SISTEM PAPERDONE</b></p>
      </center>
      <div class="table">
      	<p>Hi, <?=$nameReporter?></p>
      	<br>
        <p>Terima Kasih Atas Laporannya.</p>
        <br>
      	<p>Laporan anda sudah masuk ke sistem kami pada tanggal <?=$dateTime?>. Laporan anda sudah berhasil tersimpan kedalam sistem. Saat ini admin sedang melakukan validasi terhadap laporan yang anda berikan. Jika sudah selesai di validasi kami akan mengemail anda kembali.</p>
        <br>

      	<p>Salam Hangat</p>
      	<p>SIPAPERDONE</p>
      </div>
    </div>
    <div class="footer">&copy; 2019 All Rights Reserved.</div>
  </body>
</html>