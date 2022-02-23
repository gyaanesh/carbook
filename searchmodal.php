<?php 
include_once 'include/adminConfig.php';

$querystringVal =$_POST['querystring'];
$brand =$_POST['searchIn'];
if ($brand) 
{

  $whereColumn      = "brand_name";
  $query = "SELECT * FROM car_brand WHERE ".$whereColumn." LIKE '%".$querystringVal."%'";
}
else
{
  $mdId =$_POST['model_id'];
  $tableName        = "models";
  if (!isset($querystringVal)) 
  {
    # code...
    $query = "SELECT * FROM models WHERE model_id = " .$mdId;   
  }
  else
  {
    $query = "SELECT * FROM models WHERE model_id =" .$mdId . "  AND model_name LIKE '%".$querystringVal."%' ";   

  }
} 

$result=mysqli_query($conn, $query); 
$output =["status" =>400, "data"=>''];
if (mysqli_num_rows($result) > 0) {
    $output['status'] = 200;
      while ($r = mysqli_fetch_array($result)) {
        $anchor = '';
        $id             =  $r['id'];
        if ($brand)
        {
          $model_image  = "images/staticImages/".$r['brand_image'];
          $model_name   =  $r['brand_name'];
          $anchor       = "<img class='card-img-top getitsmodel' onclick='getitsmodel(".$r['id'].")' src='".$model_image."' data-id='".$r['id']."' data-model-name='".$model_name."'>
                  <div class=''>
                    <h4>".$model_name."</h4>
                  </div>";
        }
        else
        {
          $model_image  =   "images/model_img/".$r['model_image'];
          $model_name   =   $r['model_name'];
          // $price        =   $r['price'];
          $anchor       =   "<a href='plan-selection.php?model_name=".$model_name."&Id=".$id."&image=".$model_image."'&Dataid='".$r['id']."''>
                <img class='card-img-top' src='".$model_image."' data-id='".$r['id']."' data-model-name='".$model_name."'>
                  <div class=''>
                    <h4>".$model_name."</h4>
                  </div>
              </a>";
        }

        $output['data'] .="<div class=' card col-sm-4'>
             <div class=''>
              ".$anchor."
            </div>
          </div>
                        ";
    }
  }
  else
  {
    $output['data'] = "No Record Found";
  }
    echo json_encode($output);


// Array
// (
//     [0] => 2
//     [id] => 2
//     [1] => 1
//     [model_id] => 1
//     [2] => Amaze
//     [model_name] => Amaze
//     [3] => brand-6-model-107.jpeg
//     [model_image] => brand-6-model-107.jpeg
// )
    
?>

 