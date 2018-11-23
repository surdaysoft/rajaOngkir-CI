<?php  
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/basic/waybill",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "waybill=$waybill&courier=jne",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $data = json_decode($response, true);
  //echo json_encode($k['rajaongkir']['results']);

  /*
  for ($k=0; $k < count($data['rajaongkir']['results']); $k++){
  

    echo "<li='".$data['rajaongkir']['results'][$k]['code']."'>".$data['rajaongkir']['results'][$k]['service']."</li>";
  	//echo $data['rajaongkir']['results'][$k]['code'];
  }
  */
  //echo $data['rajaongkir']['results']['costs']['service'];
}
?>

<div class="ro-result">
    <p>
        <span class="big">Hasil pelacakan paket</span>
        <span class="pull-right"><strong><?php echo $waybill; ?> (JNE)</strong></span>
    </p>
</div>

<div id="ro-lacakpaket-result">
    <div class="process-meta b-green center"><strong></strong></div>
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <td>Nomor resi</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['summary']['waybill_number']);?></td>
            </tr>
            <tr>
                <td>Jenis layanan</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['summary']['service_code']);?></td>
            </tr>
            <tr>
                <td>Tanggal pengiriman</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['details']['waybill_date']);?> <?php echo strtoupper($data['rajaongkir']['result']['details']['waybill_time']);?></td>
            </tr>
            <tr>
                <td>Berat kiriman</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['details']['weight']);?> kg</td>
            </tr>
            <tr>
                <td>Nama pengirim</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['details']['shippper_name']);?></td>
            </tr>
            <tr>
                <td>Kota asal pengirim</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['details']['shipper_city']);?></td>
            </tr>
            <tr>
                <td>Nama penerima</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['details']['receiver_name']);?></td>
            </tr>
            <tr>
                <td>Alamat penerima</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['details']['receiver_address1']);?>, <?php echo strtoupper($data['rajaongkir']['result']['details']['receiver_address2']);?>, <?php echo strtoupper($data['rajaongkir']['result']['details']['receiver_address3']);?>, <?php echo strtoupper($data['rajaongkir']['result']['details']['receiver_city']);?></td>
            </tr>
        </tbody>
    </table>
    <div class="bor"></div>
    <p><strong>Status pengiriman</strong></p>
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <td>Status</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['delivery_status']['status']);?></td>
            </tr>
            <tr>
                <td>Nama penerima</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['delivery_status']['pod_receiver']);?></td>
            </tr>
            <tr>
                <td>Tanggal diterima</td>
                <td><?php echo strtoupper($data['rajaongkir']['result']['delivery_status']['pod_date']);?> <?php echo strtoupper($data['rajaongkir']['result']['delivery_status']['pod_time']);?></td>
            </tr>
        </tbody>
    </table>
    <div class="bor"></div>
    <p><strong>Riwayat pengiriman</strong></p>
    
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                
                <th>Tanggal</th>
                <th>Kota</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <?php
        if($data['rajaongkir']['result']['manifest'] != null){

        
     //for ($k=0; $k < count($data['rajaongkir']['result']); $k++) {
    ?>
        <tbody>
            <?php
             //for ($l=0; $l < count($data['rajaongkir']['result'][$k]['manifest']); $l++) { 
             foreach ($data['rajaongkir']['result']['manifest'] as $key) :
             ?>
            <tr>
                
                <td><?php echo $key['manifest_date'];?> <?php echo $key['manifest_time'];?></td>
                <td><?php echo $key['city_name'];?></td>
                <td><?php echo $key['manifest_description'];?></td>
            </tr>
            <?php
             //}
            endforeach;
             ?>
        </tbody>
         <?php
     //}
       }
     ?>
    </table>
    
</div>
