<?php
echo '<div class="container">';

echo form_open('konfirmasi');
$bank = array(
    'bca' => 'BCA',
    'mandiri' => 'Mandiri',
    );

echo "
<table>


  <tr>
    <td>
      Kode Pesanan :
    </td>
    <td>
      ".form_input('kode_pesanan','', 'class=')."
    </td>
  </tr>

  <tr>
    <td>
      Atas Nama :
    </td>
    <td>
      ".form_input('atas_nama','', 'class=')."
    </td>
  </tr>

  <tr>
    <td>
      Email :
    </td>
    <td>
      ".form_input('email','', 'class=')."
    </td>
  </tr>

  <tr>
    <td>
      No Handphone :
    </td>
    <td>
      ".form_input('no_handphone','', 'class=')."
    </td>
  </tr>

  <tr>
    <td>
      Nomor Invoice :
    </td>
    <td>
      ".form_input('no_invoice','', 'class=')."
    </td>
  </tr>

  <tr>
    <td>
      Jumlah yang dibayarkan :
    </td>
    <td>
      ".form_input('jumlah','', 'class=')."
    </td>
  </tr>

<tr>
    <td>
      Tanggal Pembayaran :
    </td>
    <td>
      <select name='day' style='width:50px;float:left'>
<option value='01'>1</option>
<option value='02'>2</option>
<option value='03'>3</option>
<option value='04'>4</option>
<option value='05' selected='selected'>5</option>
<option value='06'>6</option>
<option value='07'>7</option>
<option value='08'>8</option>
<option value='09'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>
      <select name='month' style='width:50px;float:left'>
<option value='01'>1</option>
<option value='02'>2</option>
<option value='03'>3</option>
<option value='04'>4</option>
<option value='05'>5</option>
<option value='06'>6</option>
<option value='07'>7</option>
<option value='08'>8</option>
<option value='09'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12' selected='selected'>12</option>
</select>
      <select name='year' style='width:50px;float:left'>
<option value='2013'>2013</option>
<option value='2014'>2014</option>
</select>
    </td>
  </tr>

  <tr>
    <td>
      Pembayaran Ke :
    </td>
    <td>
      ".form_dropdown("bank", $bank)."
    </td>
  </tr>

  <tr>
    <td>
      Bank Pengirim :
    </td>
    <td>
      ".form_input('bank_pengirim','', 'class=')."
    </td>
  </tr>

  <tr>
    <td>
      Nama Pemilik Rekening :
    </td>
    <td>
      ".form_input('nama_pemilik_rekening','', 'class=')."
    </td>
  </tr>

  <tr>
    <td>
      Catatan :
    </td>
    <td>
      ".form_textarea('catatan', '')."
    </td>
  </tr>


  <tr>
    <td>
    </td>
    <td>
     ".form_submit('submit', 'Konfirmasi', 'class=buy_button')."
    </td>
  </tr>

</table>
";
echo form_close();


echo '</div>';

?>
