<?php
include('include/header.php');

include_once 'include/adminConfig.php';
?>

<style>
    .default-plans {
    display: flex;
    flex-wrap: wrap;
    padding: 0;
    margin: 0;
    justify-content: space-between;
    margin-top: 50px;
}
.default-plans > li {
    display: flex;
    position: relative;
    width: 21%;
    flex-direction: column;
}
.default-plans .plan-box {
    box-shadow: rgb(0 0 0 / 10%) 0px 3px 8px;
    border: 2px solid gainsboro;
    width: 100%;
    margin-bottom: 25px;
    list-style-type: none;
    border-radius: 10px;
    padding: 15px;
    cursor: pointer;
}
.default-plans a {
    float: right;
    color: #000;
    text-decoration: none;
    font-size: 13px;
}
.max-plan {
    display: none;
}
.max-plan .cls-btn {
    width: 22px;
    height: 17px;
    cursor: pointer;
    position: absolute;
    right: 10px;
}
.plan-visibility .max-plan {
    display: block;
    position: absolute;
    top: -3px;
    height: 550px;
    background: #fff;
    z-index: 999;
    width: 120%;
    box-shadow: rgb(0 0 0 / 10%) 0px 3px 8px;
    border: 2px solid gainsboro;
    margin-bottom: 25px;
    list-style-type: none;
    border-radius: 10px;
    left: -3px;
    padding: 15px;
    cursor: pointer;
}
.default-plans h2 {
    font-size: 15px;
    font-weight: 700;
    text-align: center;
    border-bottom: 1px solid #1b1b47;
    padding-bottom: 10px;
}
.plan-list {
    padding-bottom: 30px;
    border-bottom: 1px solid;
    margin-top: 20px;
}
.frequency-wrapper {
    display: flex;
    border: 1px solid gainsboro;
    border-radius: 10px;
    margin: 40px 0;
}
.next {
    color: #000;
    padding: 8px 16px;
    display: block;
    float: right;
    cursor: pointer;
}
.frequency-list {
    border-right: 1px solid gainsboro;
    width: 50%;
}
.frequency-list h4 {
    border-bottom: 1px solid gainsboro;
    text-align: center;
    padding: 10px;
    margin: 0;
    font-size: 15px;
    border-bottom-left-radius: 10px;
    box-shadow: rgb(0 0 0 / 8%) 0px 1px;
}
.frequency-list select {
    width: 100%;
    border: none;
    padding: 10px;
    text-align: center;
    margin-top: 5px;
}
.cost-list {
    width: 50%;
}
.cost-list h4 {
    border-bottom: 1px solid gainsboro;
    padding: 10px;
    margin: 0;
    font-size: 15px;
    text-align: center;
    border-bottom-right-radius: 10px;
    box-shadow: rgb(0 0 0 / 8%) 0px 1px;
}
.cost-list p {
    padding: 10px;
    text-align: center;
}

.default-plans p {
    padding-bottom: 50px;
    margin: 0 0 10px;
    font-size: 14px;
    line-height: 1.42857143;
}
.subcribe-logo {
    padding-top: 115px;
}
.ftco-navbar-light
{
    background: rebeccapurple!important;
    top :0!important 
}
 .space-edit {
    margin: 0px auto 20px auto;
    width: 1000px;
    position: relative;
}
.select-section {
    width: 300px;
    margin: auto;
    font-size: 16px;
    padding: 0.2rem 0.85rem;
    font-weight: 600;
    border-radius: 50px;
    height: 45px;
    box-shadow: rgb(0 0 0 / 10%) 0px 3px 8px;
    border: 2px solid gainsboro;
}
.frequency-wrapper {
    display: flex;
    border: 1px solid gainsboro;
    border-radius: 10px;
    margin: 40px 0 26px 0;
}
</style>   
<div class="subcribe-logo container-fluid"><img src="images/subscribe-logo.png" style="width:150px;"></div>
<div class="container space-edit">
  <select class="form-control select-section ">
        <option>My Car</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
    </select>

    <ul class="default-plans" id="default-plans">
      <li>
            <?php
            
              $query=mysqli_query($conn,"select * from plans");
              $numCount = 0;
              while ($resdata=mysqli_fetch_array($query)) 
              {
                ?>

                <section class="plan-box" >
                    <div class="min-plan">
                        <h2>
                            <?php echo $resdata['title']  ?>
                            <?php echo $resdata['id']  ?>
                        </h2>
                        <p>
                        <?php echo substr($resdata['description'],0 ,100)  ?>
                       </p>
                        <a>Know More</a>
                    </div>
                    <div class="max-plan">
                        <span class="cls-btn"></span>
                        <h2 class="plan-heading">Plan 1</h2>
                        <ul class="plan-list">
                            <li>Interior spa</li>
                            <li>Rubbing-polishing</li>
                            <li>Snow Foam wash</li>
                            <li>Dashboard Dressing</li>
                            <li>Tyre Dressing</li>
                            <li>Compound Rubbing By Machine</li>
                        </ul>
                        <div class="frequency-wrapper">
                            <div class="frequency-list">
                                <h4>Frequency</h4>
                                <div id="input_div">
                                     <input type="button" value="-" id="moins" class="minus-edit minus-option" onclick="subsOne(<?php echo $resdata['id'] ?>, <?php echo $resdata['base_price'] ;?>)">
                                     <input type="text" size="25" value="1" id="<?php echo "counter".$resdata['id'] ?>" style="width:50px;" disabled>  
                                     <input type="button" value="+" id="plus" class="minus-edit minus-option" onclick="addOne( <?php echo $resdata['id'] ?>, <?php echo $resdata['base_price'] ;?>)">
                                </div>
                            </div>
                            <div class="cost-list">
                                <h4>Cost    </h4>
                                <p class="bd-edit d-none" id="oldPrice<?php echo $resdata['id'] ?>" style=" text-decoration: line-through;text-decoration-color: red;font-weight: bold;">@ <?php echo $resdata['base_price']  ?> </p>
                                <p style="padding:0" id="currentPrice<?php echo $resdata['id'] ?>">@ <?php echo $resdata['base_price']  ?></p>
                                <p id="newPrice<?php echo $resdata['id'] ?>" class="d-none" style="padding: 0;"> 12121</p>
                            </div>
                        </div>
                        <div class="next" ><a href="#" onclick="AddToCart(<?php echo $resdata['id'] ?>)" class="btn btn-secondary" data-plan-id="<?php echo $resdata['base_price']  ?>" type="button"> ADD To Trunk</a></div>
                    </div>
                </section>
            <?php
              
                if ($numCount%2) 
                { 
                echo "</li><li>";
                }
                $numCount++;
              }
            ?>
        </li>
    </ul>

    <button class="btn btn-secondary plan-btn d-none" type="submit" id="plans-btn">Add to Trunk</button>
</div>

<?php
include('include/footer.php');
?>
    <script type="text/javascript">
    
    var count = 1;
    
    function addOne(counterId , basePrice) 
    {
        
        if (count < 21) 
        {
            count++;
            $("#counter"+counterId).val(count)
        }
        var NewBasePrice  =  getFinalPrice(counterId , count , basePrice)
        $("#newPrice"+counterId).text(NewBasePrice)
        
    }
     
    function subsOne( counterId , basePrice)
    {
        if (count > 1) {
            count--;
        }
            $("#counter"+counterId).val(count)
        var NewBasePrice  =  getFinalPrice( counterId , count , basePrice)
        $("#newPrice"+counterId).text(NewBasePrice)
        
    }
    
    function getFinalPrice(counterId , selectedCount , basePrice) 
    {
        
        $("#oldPrice"+counterId).removeClass("d-none")
        $("#currentPrice"+counterId).addClass("d-none")
        $("#newPrice"+counterId).removeClass("d-none")

        if (selectedCount == 1) 
        {
            $("#oldPrice"+counterId).addClass("d-none")
            $("#currentPrice"+counterId).removeClass("d-none")
            $("#newPrice"+counterId).addClass("d-none")

            return basePrice * selectedCount * 1

        }
        else if(selectedCount == 2)
        {
            return basePrice * selectedCount * .95
        }
        else if(selectedCount == 3)
        {
            return basePrice * selectedCount * .90
        }
        else if(selectedCount == 4)
        {
            return basePrice * selectedCount * .84
        }
        else if(selectedCount == 5)
        {
            return basePrice * selectedCount * .78
        }
        else
        {
            console.log(selectedCount);
            console.log(basePrice);
        }
    }
    
    
    
    
    
    
    
        var allPlans = document.querySelectorAll('#default-plans  .plan-box');
        var clsBtn = document.querySelectorAll('#default-plans  .cls-btn');
        var nxtBtn = document.querySelectorAll('#default-plans  .next');
        var elements = document.querySelectorAll('.plan-btn');

        function initialBind() {
            for(var i=0; i<allPlans.length; i++){
                allPlans[i].onclick = plansHandling;
                clsBtn[i].onclick = closePlans;
                nxtBtn[i].onclick = closePlanWithHighlight;
            }
        }
        function plansHandling() {
            for(var i=0; i<allPlans.length; i++){
                allPlans[i].classList.remove('plan-visibility');
                allPlans[i].classList.remove('highlight-plan');
                document.getElementById("plans-btn").classList.remove("plan-btn-border");
            }
            this.classList.add('plan-visibility');
        }

        function closePlans(e) {
            e.stopPropagation();
            this.closest('.plan-box').classList.remove('plan-visibility');
        }

        function closePlanWithHighlight(e) {
            e.stopPropagation();
            for(var i=0; i<allPlans.length; i++){
                allPlans[i].classList.remove('highlight-plan');
            }
            this.closest('.plan-box').classList.remove('plan-visibility');
            this.closest('.plan-box').classList.add('highlight-plan');
            document.getElementById("plans-btn").classList.add("plan-btn-border");
        }

        function bindEvents() {
            initialBind();
        }
        bindEvents();




     function AddToCart(argument) 
    { 
        console.log(argument)
        $.ajax({
        type: "POST",
        url: "addtocart.php",
        data: { planid : argument },
        success:function(data)
        {
            var data = JSON.parse(data)
            if (data.status == 406) 
            {
                alert("allready have a Car Item")
            }
            if (data.status == 200) 
            {
                $(".fa-shopping-cart span").removeClass("d-none")
                $(".fa-shopping-cart span").text("1")
            }
        }
    });
    }
    </script>

