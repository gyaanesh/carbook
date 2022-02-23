<?php 
include 'include/adminConfig.php';

$modelId =$_POST['modelId'];

$query = "SELECT * FROM models WHERE model_id =".$modelId;
$result=mysqli_query($conn, $query); 
$output =["status" =>400, "data"=>''];

if (mysqli_num_rows($result) > 0) 
{
  $output['status'] = 200;
   
    
      while ($r = mysqli_fetch_array($result)) 
      {
        $id             =  $r['id'];

        $model_image  = "images/model_img/".$r['model_image'];
        $model_name   =  $r['model_name'];
        
        $output['data'] .="<div class='card col-sm-4'>
             <div class='brandmodelHolder style-7'>
              <a href='plan-selection.php?model_name=".$model_name."&Id=".$id."&image=".$model_image."'&Dataid='".$r['id']."''>
                        <img class='card-img-top' src='".$model_image."' data-id='".$r['id']."' data-model-name='".$model_name."'>
                        <div class='card-body'>
                        <h4>".$model_name."</h4></div></a>
            </div>
          </div>";
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

 