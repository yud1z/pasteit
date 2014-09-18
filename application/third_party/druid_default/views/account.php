<?php
$data_detail = (!empty($data_detail[0])) ? $data_detail[0] : array();
$source_lahir = (isset($data_detail->data_tanggal_lahir)) ? $data_detail->data_tanggal_lahir : "01-01-1994";
$lahir  = explode('-', $source_lahir);
$lahir_tanggal  = (int) $lahir[2];
$lahir_bulan    = (int) $lahir[1];
$lahir_tahun    = (int) $lahir[0];
?>
<script type="text/javascript" src="/files/js/str_replace.js"></script>
<script type="text/javascript" src="/register/ajax/place"></script>
<div class="containers" style="margin-top:-175px; ">

  <h1 id="">Account Settings</h1>
  <div class="line-separator"></div>
  <?php echo (isset($error)) ? $error : "";?>
    <form action="/account" class="form-2" style="float:left;margin-left:100px;" method="POST" accept-charset="utf-8">
      <input type="hidden" name="type" value="standard">
      <h1><b>Account Settings</b></h1>
      <table border="0">
        <tr>
          <td>Email</td>
          <td> : </td>
          <td><input type="text" name="email" value="<?php echo (isset($detail['data_email']))? $detail['data_email'] : ''; ?>"></td>
        </tr>
        <tr>
          <td>Username</td>
          <td> : </td>
          <td><input type="text" name="username" value="<?php echo (isset($detail['user_name']))? $detail['user_name'] : ''; ?>"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td> : </td>
          <td><input type="password" name="password" value=""></td>
        </tr>
        <tr>
          <td>rePassword</td>
          <td> : </td>
          <td><input type="password" name="repassword" value=""></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><input type="submit" name="submit" value="submit"></td>
        </tr>
      </table>
    </form>
    

    <form action="/account" class="form-2" style="float:left;margin-left:100px;" method="POST" accept-charset="utf-8">
      <input type="hidden" name="type" value="detail">
      <h1><b>Account Detail</b></h1>
      <table border="0">
        <tr>
          <td>Nama Lengkap</td>
          <td> : </td>
          <td><input type="text" name="nama_lengkap" value="<?php echo (isset($data_detail->data_nama_lengkap)) ? $data_detail->data_nama_lengkap : ''; ?>"></td>
        </tr>
        <tr>
          <td>Tanggal lahir</td>
          <td> : </td>
          <td>
      <select name="tanggal" style="margin:10px;">
        <?php
            for ($i = 1; $i <= 31; $i++) {
              if ($i == $lahir_tanggal) {
                echo '<option value="'. $i .'" selected>'. $i .'</option>';
              }
              else {
                echo '<option value="'. $i .'">'. $i .'</option>';
              }
            }
        ?>
      </select>
      <select name="bulan" style="margin:10px;">
        <?php
            for ($l = 1; $l <= 12; $l++) {
              if ($l == $lahir_bulan) {
                echo '<option value="'. $l .'" selected>'. $l .'</option>';
              }
              else {
                echo '<option value="'. $l .'">'. $l .'</option>';
              }
            }
        ?>
      </select>
      <select name="tahun" style="margin:10px;">
        <?php
            for ($k = 1940; $k <= 1995; $k++) {
              if ($k == $lahir_tahun) {
                echo '<option value="'. $k .'" selected>'. $k .'</option>';
              }
              else {
                echo '<option value="'. $k .'">'. $k .'</option>';
              }
            }
        ?>
      </select>
</td>
        </tr>
        <tr>
          <td>Full Address</td>
          <td> : </td>
          <td>
      <label for="province" style="margin-bottom:5px;margin-top:5px;">Province(<font style="color:red">*</font>)</label>
      <select name="province" id="province">
        <option id="null_province" value="-1">---</option>
      </select>
      <br>
      <label for="state" style="margin-bottom:5px;margin-top:5px;">City(<font style="color:red">*</font>)</label><!--Kota-->
      <select name="state" id="state">
        <option id="null_state" value="-1">---</option>
      </select>
      <br>
      <label for="district" style="margin-bottom:5px;margin-top:5px;">District(<font style="color:red">*</font>)</label><!--Kecamatan-->
      <select name="district" id="district">
        <option id="null_district" value="-1">---</option>

      </select>

</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td> : </td>
          <td><textarea name="alamat" rows="8" name="alamat" cols="40"><?php echo (isset($data_detail->data_alamat)) ? $data_detail->data_alamat : ""; ?></textarea></td>
        </tr>
        <tr>
          <td>Kode pos</td>
          <td> : </td>
          <td><input type="text" name="kode_pos" value="<?php echo  (isset($data_detail->data_kode_pos)) ? $data_detail->data_kode_pos : "";?>"></td>
        </tr>
        <tr>
          <td>Negara</td>
          <td> : </td>
          <td><input type="text" name="negara" value="<?php echo  (isset($data_detail->data_negara)) ? $data_detail->data_negara : "";?>"></td>
        </tr>
        <tr>
          <td>No Telp</td>
          <td> : </td>
          <td><input type="text" name="no_telp" value="<?php echo  (isset($data_detail->data_no_telp)) ? $data_detail->data_no_telp : "";?>"></td>
        </tr>
        <tr>
          <td>Mobile Phone</td>
          <td> : </td>
          <td><input type="text" name="mobile_phone" value="<?php echo  (isset($data_detail->data_no_phone)) ? $data_detail->data_no_phone : "";?>"></td>
        </tr>
        <tr>
          <td>Newsletter</td>
          <td> : </td>
          <td><input type="checkbox" name="newsletter" 
<?php
        if (isset($data_detail->data_newsletter)) {

            if ($data_detail->data_newsletter == 1) {
              echo 'checked';
            }
            else {
              echo '';
            }
        }
?> ></td>
        </tr>
        <tr>
          <td>Milist</td>
          <td> : </td>
          <td><input type="checkbox" name="milist"
<?php
        if (isset($data_detail->data_milist)) {

            if ($data_detail->data_milist == 1) {
              echo 'checked';
            }
            else {
              echo '';
            }
        }
?>></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><input type="submit" name="submit" value="submit"></td>
        </tr>
      </table>
    </form>

</div>


<script type="text/javascript" charset="utf-8">
  $(function(){

      address = new Object();
      address.code = '<?php echo (isset($data_detail->ongkir_id)) ? $data_detail->ongkir_id : ''; ?>';

      function province_loader()
      {
      $.each(place, function(i, obj) {
        $('#null_province').after('<option id="null_province" value="'+ i +'">' +
              i.toUpperCase().replace('_', ' ').replace('__', ' ') +
          '</option>');
        });
      }
      province_loader();

      $('#province').change(function(){
          eval('var w = place.' + $(this).val()); 
          $('#null_state').nextAll().remove();
          $('#null_district').nextAll().remove();
          $.each(w, function(i, obj) {
            $('#null_state').after('<option id="null_state" value="'+ i +'">' +
              str_replace('_', ' ', i.toUpperCase())+
              '</option>');
            });
        });

      $('#state').change(function(){
         var prov = $('#province').find(":selected").val();
          eval('var w = place.'+ prov + '.' + $(this).val()); 

          $('#null_district').nextAll().remove();

          $.each(w, function(i, obj) {
            $('#null_district').after('<option id="null_state" value="'+ obj +'">' +
              str_replace('_', ' ', i.toUpperCase())+
              '</option>');
            });
        });


      //  if address code not set
      if (address.code != '') {

        //  set the 
      $.each(place, function(i, obj) {
        $.each(obj, function(k, kob){
          $.each(kob, function(l, pok){
            if (pok == address.code) {

              uta = i;
              uti = k;
              uto = l;

              //  setting the province table
              eval('prov = place.'+ i +';');
              //  setting the state  table
              eval('state = prov.'+ k +';');
              //  setting the dsitrict table
              eval('dis = state.'+ l +';');

            }
          });
        });

        });


      $('#null_state').nextAll().remove();
      $.each(place, function(i, obj) {
        if (i == uta) {
          $('#null_province').after('<option id="null_province" value="'+ i +'" selected>' +
            i.toUpperCase().replace('_', ' ').replace('__', ' ') +
            '</option>');
        }
        else {
          $('#null_province').after('<option id="null_province" value="'+ i +'">' +
            i.toUpperCase().replace('_', ' ').replace('__', ' ') +
            '</option>');
        }

      });


      $.each(prov, function(i, obj) {
        if (i == uti) {
          $('#null_state').after('<option id="null_state" value="'+ i +'" selected>' +
            i.toUpperCase().replace('_', ' ').replace('__', ' ') +
            '</option>');
        }
        else {
          $('#null_state').after('<option id="null_state" value="'+ i +'">' +
            i.toUpperCase().replace('_', ' ').replace('__', ' ') +
            '</option>');
        }

      });

      $.each(state, function(i, obj) {
        if (i == uto) {
          $('#null_district').after('<option id="null_district" value="'+ obj +'" selected>' +
            i.toUpperCase().replace('_', ' ').replace('__', ' ') +
            '</option>');
        }
        else {
          $('#null_district').after('<option id="null_district" value="'+ obj +'">' +
            i.toUpperCase().replace('_', ' ').replace('__', ' ') +
            '</option>');
        }

      });



      }


      });
</script>
