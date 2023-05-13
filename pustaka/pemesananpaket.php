<div class="part">
            <label>Paket</label>
                      <select name="nama_paket" id="nama_paket" class="part" onchange='changeValue(this.value)' required >  
                        <option>pilih paket</option>
                          <?php   
                            $query  = mysqli_query($koneksi, "SELECT * FROM paket ORDER BY nama_paket esc");  
                              $result = mysqli_query($koneksi, "SELECT * FROM paket");  
                              $harga  = "var harga = new Array();\n;";  
         
                              while ($row = mysqli_fetch_array($result)) {  
                                  echo '<option name="nama_paket" value="'.$row['nama_paket'] . '">' . $row['nama_paket'] . '</option>';   
                              $harga .= "harga['" . $row['nama_paket'] . "'] = {harga:'" . addslashes($row['harga'])."'};\n";  
                          }
                            ?>  
                      </select>
                  </div><br>
          <div class="part">
            <label for="nama" style="padding-top: 20px">Harga</label>
            <input type="text" name="harga" id="harga" readonly>
          </div><br>
            
          <script type="text/javascript">   
                        <?php   
                          echo $harga;   
                        ?>  
                            function changeValue(id){  
                              document.getElementById('harga').value = harga[id].harga;  
                            };   
                    </script>  

          <div class="part">
            <label>pesan</label>
            <textarea name="pesan" placeholder="masukan detail tambahan"></textarea>
          </div><br>

            <?php
              if(isset($_POST['id_pengguna'])){
              $tanggal_awal = $_POST['tanggal_awal'];

              $pemesanan = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE tanggal_awal='".$_POST['tanggal_awal']."' OR tanggal_akhir='".$_POST['tanggal_akhir']."'");
              $cek_data=mysqli_num_rows($pemesanan);

                if ($cek_data > 0) {
                  echo "<script>alert('Tanggal tersebut Sudah terpesan , Silahkan Pilih tanggal lain');  document.location='home.php?page=pemesanan';</script>";
                }else{

                  $nama     = $_POST['id_pengguna'];
                  $notelp     = $_POST['notelp'];
                  $nama_paket   = $_POST['nama_paket'];
                  $alamat     = $_POST['alamat'];
                  $tanggal_awal = $_POST['tanggal_awal'];
                  $tanggal_akhir  = $_POST['tanggal_akhir'];
                  $harga      = $_POST['harga'];
                  $pesan      = $_POST['pesan'];

                    $query=mysqli_query($koneksi, "INSERT INTO transaksi (id_pengguna,notelp,paket,alamat,tanggal_awal,tanggal_akhir,harga,pesan) VALUES ('".$nama."','".$notelp."','".$nama_paket."','".$alamat."','".$tanggal_awal."','".$tanggal_akhir."','".$harga."','".$pesan."')");

                    echo "<script>alert('Data berhasil di simpan , Silahkan konfirmasi pemesanan'); document.location='home.php?page=pemesanan';</script>";
                }
              }?>

              <a href="home.php?page=pemesanan&action=pesan_satuan" style="padding-left: 325px;">sewa tenda satuan ?</a>