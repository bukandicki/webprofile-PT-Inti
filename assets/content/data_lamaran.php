<?php
      include '../settings/koneksi.php';
      error_reporting(~E_NOTICE);
      $sql = mysql_query("SELECT * FROM lamaran WHERE NAMA LIKE '%".$_POST['query']."%'");
      if (mysql_num_rows($sql) > 0) {
        while ($result = mysql_fetch_array($sql)) {
          ?>
              <tr <?php
                if($result['STATUS'] == 'DITOLAK'){
                  echo "style='background: rgb(231, 76, 60);color: #ffffff !important;'";
                }elseif($result['STATUS'] == 'DITANGGUHKAN') {
                  echo "style='background: #ffc107;color: #ffffff !important;'";
                }elseif($result['STATUS'] == 'DITERIMA') {
                  echo "style='background: rgb(46, 204, 113);color: #ffffff !important;'";
                }elseif($result['STATUS'] == 'KARYAWAN') {
                  echo "style='display:none;'";
                }else {

                }
              ?>>
                <td><?php echo $result['ID_LAMARAN']; ?></td>
                <td><?php echo $result['NAMA']; ?></td>
                <td><?php echo $result['EMAIL']; ?></td>
                <td><?php echo $result['TANGGAL_LAMARAN']; ?></td>
                <td>
                  <a href="look.php?id=<?php echo $result['ID_LAMARAN']; ?>" class="btn-admin" title="Lihat"><i class="fas fa-eye"></i></a>
                  <a href="mailto:<?php echo $result['EMAIL']; ?>?subject=Lamaran" "email me" id="<?php echo $result['ID_LAMARAN']; ?>" class="btn-admin accept" title="Panggil"><i class="fas fa-phone"></i></a>
                  <a href="mailto:<?php echo $result['EMAIL']; ?>?subject=Lamaran" "email me" id="<?php echo $result['ID_LAMARAN']; ?>" class="btn-admin refuse tolak" title="Tolak"><i class="fas fa-ban"></i></a>
                  <a href="add.php?id=<?php echo $result['ID_LAMARAN']; ?>" class="btn-admin add" title="Tambah Karyawan"><i class="fas fa-plus"></i></a>
                  <a href="#" class="btn-admin refuse hapus" id="<?php echo $result['ID_LAMARAN']; ?>" title="hapus"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
          <?php
        }
      }else {
        ?>
          <tr>
            <td style="background-color: #dc3545;color: #ffffff;" colspan="5" rowspan="" headers="">Data <span style="color: yellow;">[ <?php echo $_POST['query']; ?> ]</span> yang anda cari tidak ditemukan</td>
          </tr>
        <?php
      }
      echo '
      <script type="text/javascript">
        $(document).ready(function () {
            $(".hapus").click(function () {
              if(confirm("Apakah anda yakin ingin menghapus ?")){
                var delete_id = $(this).attr("id");
                $.ajax({
                  url:"delete.php",
                    method:"POST",
                    data:{idnya:delete_id},
                    success:function(data)
                    {
                      alert(data);
                    }
                  });
                }
              });
              
              $(".tolak").click(function () {
                if(confirm("Apakah anda yakin ingin menolak ?")){
                  var refuse_id = $(this).attr("id");
                  $.ajax({
                    url:"refuse.php",
                      method:"POST",
                      data:{idnyaa:refuse_id},
                      success:function(data)
                      {
                        alert(data);
                      }
                    });
                }
              });

              $(".accept").click(function () {
                if(confirm("Apakah anda yakin ingin menolak ?")){
                  var accept_id = $(this).attr("id");
                  $.ajax({
                    url:"accept.php",
                      method:"POST",
                      data:{idnyaa:accept_id},
                      success:function(data)
                      {
                        alert(data);
                      }
                    });
                }
              });
        });
      </script>
'
;
    ?>
