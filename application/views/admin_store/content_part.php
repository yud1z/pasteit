<div id="list_user">

<h1 id="Store">Store</h1>
<hr>


  <fieldset id="List admin">
    <legend style="border:solid 0px white;">Rangkuman</legend>
    <center>
      <table border="0" class="table">
        <tr>
          <td>Buku Terpesan</td>
          <td><?php echo $buku_terpesan; ?> Buku</td>
        </tr>
        <tr>
          <td>Buku Terbayar</td>
          <td><?php echo $buku_terbayar; ?>  Buku</td>
        </tr>
        <tr>
          <td>Buku Terkirim</td>
          <td>0 Buku</td>
        </tr>
        <tr>
          <td>Total Buku</td>
          <td><?php echo $buku_total; ?> Buku</td>
        </tr>
      </table>
    </center>

  </fieldset>


  <style type="text/css" media="screen">

    .poin{
      cursor:pointer;
    } 

  </style>

  <fieldset id="List admin">
    <legend style="border:solid 0px white;">Transaksi</legend>

    <table border="0" class="table table-hover">
      <tr>
        <th>No</th>
        <th>No Invoice</th>
        <th>Nama</th>
        <th>Tanggal Pesan</th>
        <th>Status</th>
      </tr>
      <?php

       foreach ($transaksi as $key_transaksi) {


          if (isset($key_transaksi->data_nama_lengkap)) {
            $nama = $key_transaksi->data_nama_lengkap;
          }
          else {
            $nama = $key_transaksi->user_name;
          }

         echo '
           <tr class="poin" ref="'. $key_transaksi->invoice_id .'">
           <td>'. $key_transaksi->invoice_id .'</td>
           <td>NEMA'. $key_transaksi->invoice_id .'</td>
           <td>'. $nama .'</td>
           <td>'. $key_transaksi->date_time .'</td>
           <td>terpesan</td>
           </tr>

           ';
       }

      ?>
    </table>


  </fieldset>


</div>



<script type="text/javascript" charset="utf-8">

  $(function(){
        $('.poin').click(function(){
            top.location=('/admin_store/detail/' + $(this).attr('ref'));
            
          });
      });

</script>
