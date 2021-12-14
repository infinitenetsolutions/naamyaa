<?php 
// $api="https://countriesnow.space/api/v0.1/countries/states";
// $json_data = file_get_contents($api);
// // echo $json_data;
// $data = json_decode($json_data);

// for( $j=1; $j<36;$j++){
//   $state=$data->data[99]->states[$j]->name;
//   echo $state;
//  echo "<br>";
// }
$api="https://countriesnow.space/api/v0.1/countries/population/cities";
$json_data = file_get_contents($api);
// echo $json_data;
for( $j=1; $j<3600;$j++){
$data = json_decode($json_data);
print_r($data->data[$j]->city);
print_r($data->data[$j]->country);
echo "<br>";
}


?>
