<?php 
include_once 'include/header.php';
include_once 'include/adminConfig.php';
?>
<script src="js/custome.js"></script>
<style>
 
  .scrollbar
{
    height:250px;
    overflow-y: scroll;
    
}

.style-7::-webkit-scrollbar-track
{
   -webkit-box-shadow: inset 0 0 6px rgb(0 0 0 / 5%);
    background-color: #F5F5F5;
    border-radius: 10px;
}

.style-7::-webkit-scrollbar
{
    width: 10px;
    background-color: #F5F5F5;
}

.style-7::-webkit-scrollbar-thumb
{
    border-radius: 10px;
     background: linear-gradient( 70deg, #efefef 10%, #002b4f) !important;
}
.active-cyan-4 input[type=text]:focus:not([readonly]) {
  border: 1px solid #4dd0e1;
  box-shadow: 0 0 0 1px #4dd0e1;
}
.active-cyan-3 input[type=text] {
  border: 1px solid #4dd0e1;
  box-shadow: 0 0 0 1px #4dd0e1;
}
.responseHere
{
  max-height: 400px;
  overflow-y: scroll;
}
.rowManufct .card:hover, .responseHere .card:hover
{
  box-shadow: -7px 5px 10px 4px rgb(0 0 0 / 30%)
}
.typeahead img
{
  max-width: 50px!important;
}
/*SEARCH BAR CSS STARTS*/
.active-pink-4 input[type=text]:focus:not([readonly]) {
  border: 1px solid #f48fb1;
  box-shadow: 0 0 0 1px #f48fb1;
}
.active-pink-3 input[type=text] {
  border: 1px solid #f48fb1;
  box-shadow: 0 0 0 1px #f48fb1;
}
.active-purple-4 input[type=text]:focus:not([readonly]) {
  border: 1px solid #ce93d8;
  box-shadow: 0 0 0 1px #ce93d8;
}
.active-purple-3 input[type=text] {
  border: 1px solid #ce93d8;
  box-shadow: 0 0 0 1px #ce93d8;
}
.active-cyan-4 input[type=text]:focus:not([readonly]) {
  border: 1px solid #4dd0e1;
  box-shadow: 0 0 0 1px #4dd0e1;
}
.active-cyan-3 input[type=text] {
  border: 1px solid #4dd0e1;
  box-shadow: 0 0 0 1px #4dd0e1;
}
/*SEARCH BAR CSS  ENDS*/

</style> 

<section style="margin-top: 100px">
  <center>
    <h2>Select your Vehicle</h2>
    <div class="row">
      
    <div class="col-md-4 offset-2" >
      <div class="car-wrap rounded ftco-animate fadeInUp ftco-animated">
          <a href="">
            
            <div class="img rounded d-flex align-items-end" style="background-image: url(https://5.imimg.com/data5/QQ/JC/FY/SELLER-45461290/yamaha-yzf-r15-v-3-0-bike-500x500.jpg);">
            </div>
          </a>
          <div class="text">
            <h2 class="mb-0"><a href="car-single.html">BIKE</a></h2>
            
        </div>
      </div>
    </div>
    <div class="col-md-4" >
      <div class="car-wrap rounded ftco-animate fadeInUp ftco-animated">
          <a href="?type=car">
          <div class="img rounded d-flex align-items-end" style="background-image: url(images/car-10.jpg);">
          </div>
          </a>
          <div class="text">
            <h2 class="mb-0"><a href="car-single.html">CAR</a></h2>
        </div>
      </div>
    </div>
    </div>
  </center> 
</section>
<section>
  
  <?php if (isset($_GET['type'])) 
  {
    if ( $_GET['type'] =="car") 
    {
      # code...
      echo'<div class="row" style="text-align: center; align-items: center;">' ;
    }
    else
    {
      echo'<div class="row d-none" style="text-align: center; align-items: center;">' ;

    } 
  }
  ?>
  <div class="col-sm-6 offset-3">
    <div class="container-fluid" id="testauto">
      <div class="srch-card">
        <h3>Select Your Manufacturer</h3>
        <div class="active-cyan-4 mb-4">
          <input class="form-control typeahead" data-provide="typeahead" id="searchBarForbrand" type="text" placeholder="Search for a Brand" onkeyup="getVehicleModal('brand')" aria-label="Search">
          <input class="form-control typeahead d-none" data-provide="typeahead" data-id="" id="searchBarModel" type="text" placeholder="Search for a model" onkeyup="getVehicleModal()" aria-label="Search">
        </div>
        <div class="row responseHere style-7">
        
        </div>
      </div>
    </div>
    <?php  $car_brands=mysqli_query($conn,"select * from car_brand ");?>              
    <div class="row rowManufct style-7" style="margin: 0; overflow-y: scroll; height: 400px; padding-left: 10px " >
        <?php if(isset($car_brands)){
            foreach($car_brands as $brands)
            {?>
              <div class=" card col-md-4 " onClick="getitsmodel(<?php echo $brands["id"]; ?>);">
                <img class="card-img-top" src="images/staticImages/<?php echo $brands['brand_image'];?>"  alt="Honda">
                <div class="card-body">
                  <h4><?php echo $brands['brand_name'];?></h4>
                </div>
              </div>  
          <?php } }?>
  </div>
    </div>
  </div>
</section>

<h1>
  THIS IS TEST
</h1>

<?php 

include_once 'include/footer.php';
 ?>