<div style="float:right;"><a href="/admin_store/delete/61" class="btn btn-large btn-danger"><i class="icon-remove-circle icon-white"></i> Hapus</a></div>
<div style=";"><a href="/admin_store" class="btn btn-info btn-large"><i class="icon-arrow-left icon-white"></i> kembali</a></div>
<h2 id="heading">Data</h2>
<?php foreach ($transaksi_detail as $detail): ?>
<table border="0" class="table table-condensed">
  <tr>
    <td>Nama Lengkap</td>
    <td><?php echo $detail->data_nama_lengkap; ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td><?php echo $detail->data_alamat; ?></td>
  </tr>
  <tr>
    <td>Propinsi</td>
    <td><?php echo $detail->ongkir_propinsi; ?></td>
  </tr>
  <tr>
    <td>Kabupaten</td>
    <td><?php echo $detail->ongkir_kabupaten; ?></td>
  </tr>
  <tr>
    <td>Kecamatan</td>
    <td><?php echo $detail->ongkir_kecamatan; ?></td>
  </tr>
  <tr>
    <td>Kode Pos</td>
    <td><?php echo $detail->data_kode_pos; ?></td>
  </tr>
  <tr>
    <td>No telp</td>
    <td><?php echo $detail->data_no_telp; ?></td>
  </tr>
  <tr>
    <td>No Handphone</td>
    <td><?php echo $detail->data_no_phone; ?></td>
  </tr>
  <tr>
    <td>Ongkos Kirim</td>
    <td><?php echo $detail->ongkir_reguler; ?></td>
  </tr>
</table>

<h2 id="heading">Invoice Detail</h2>
<table border="0" class="table table-condensed">
  <tr>
    <td>Invoice Id</td>
    <td><?php echo $detail->invoice_id; ?></td>
  </tr>
  <tr>
    <td>Total Berat</td>
    <td><?php echo $detail->invoice_berat; ?> Kg</td>
  </tr>
  <tr>
    <td>Total Kuantitas</td>
    <td><?php echo $detail->checkout_quantity; ?></td>
  </tr>
  <tr>
    <td>Total Harga</td>
    <td><?php echo $detail->invoice_harga; ?></td>
  </tr>
  <tr>
    <td>Invoice Code</td>
    <td><?php echo $detail->invoice_code; ?></td>
  </tr>
  <tr>
    <td>Date Time</td>
    <td><?php echo $detail->date_time; ?></td>
  </tr>

</table>
<?php break;  endforeach; ?>


<h2 id="heading">Detail Transaction</h2>
<?php foreach ($transaksi_detail as $detail_1): ?>
<table border="0" class="table table-condensed">
<tr>
  <td>
    Nama Produk
  </td>
  <td>
    <?php echo $detail_1->content_title ?>
  </td>
</tr>
<tr>
  <td>
    ID Produk
  </td>
  <td>
    <?php echo $detail_1->produk_id ?>
  </td>
</tr>
<tr>
  <td>
    Harga Produk
  </td>
  <td>
    <?php echo $detail_1->produk_harga ?>
  </td>
</tr>
<tr>
  <td>
    Berat Produk
  </td>
  <td>
    <?php echo $detail_1->produk_weight ?>
  </td>
</tr>
</table>
<?php  endforeach; ?>


