<?php 
include_once 'include/adminConfig.php';

$planid = $_POST['planid'];
$userid = 4; //GET IT FROM
$queryCheckInCart ="SELECT * FROM cart WHERE user_id= $userid AND status ='1'";
$output = [];
if ( mysqli_num_rows(mysqli_query($conn, $queryCheckInCart)))
{
	$output['status'] = '406';
}
else
{



	$query  = "INSERT INTO `cart` (`id`, `plan_id`, `user_id`, `status`) VALUES (NULL, $planid , $userid , '1');";
	mysqli_query($conn, $query);
	$output['status'] = '200';



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
    
}
echo json_encode($output);
?>

 