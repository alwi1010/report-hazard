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

			.content p {
        padding-top: 8px;
        padding-bottom: 10px;
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

			.content a{
        color: #006aaf;
      }

      .content a.button {
        font-size: 15px;
        line-height: 15px;
        color: #fff;
        background: #00a2db;
        text-decoration: none;
        padding: 12px 28px;
        margin: 18px 0;
      }

      .content {
        margin: 1.5em;
        font-family: Arial, sans-serif;
        font-size: 18px;
        color: #000;
      }
    </style>
  </head>

  <body>
  <!-- Nanti untuk IMG SRCnya itu di ganti dengan URL web yang valid. -->

	<div class="header"><img src="<?php echo base_url().'asset/images/logo_jadi.webp' ?>" alt="Logo Ngurah Rai" style="height: 50px;"></div>
    <div class="content">
      <center>
        <p><b>SISTEM PAPERDONE</b></p>
      </center>
      <div class="table">

  			<p>Hi, <?php echo $uname; ?>!</p>

      	<p>Anda telah berhasil melakukan login pada tanggal <?php echo $date.' '.$time; ?>. Jika anda tidak meresa melakukan login, silahkan klik tombol dibawah ini untuk mengatur ulang password anda.</p>

      	<p><a class="button" href='<?php echo base_url("login/lupa_kata_sandi/"); ?>'>Ganti Password</a></p>

      	<p>Salam Hangat</p>
      	<p>SIPAPERDONE</p>
      </div>
    </div>
    <div class="footer">&copy; 2019 All Rights Reserved.</div>
	</body>
</html>