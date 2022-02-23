function getVehicleModal(argument)
{ 
  if (argument)
  {
    // SEARCH FFOR BRAND
    var typedVal = $("#searchBarForbrand").val()
  }
  else
  {
    // SEARCH FOR MODEL
    var modelId = $("#searchBarModel").attr('data-id')
    var argument =''
    var typedVal = $("#searchBarModel").val()
  }
    if (typedVal!=null && typedVal != "")
    {
      jQuery.ajax({
        type: "POST",
        url: "searchmodal.php",
        data: { querystring : typedVal , searchIn :argument, model_id : modelId},
        success:function(data)
        {

          var response  = JSON.parse(data)
          if (response.status== 200)
          {
            if (argument) 
            {
             $(".rowManufct").fadeOut('fast')
              $("#testauto .responseHere").html(response.data) 
            }
            else
            {
              $("#testauto .responseHere").html('')
              $("#testauto .responseHere").html(response.data)
            }
  
          }
          else
          {
            $("#testauto .responseHere").html('')
            $("#testauto .responseHere").html("<p> No Model Found</p>")
          }  
        }
      });
    }
    else
    {
      if (argument) 
      {
       $(".rowManufct ").fadeIn('fast')

      }
      $("#testauto .responseHere").html('')
    }
}

 function getitsmodel(argument) 
  { 
    model_id = argument  
    $.ajax({
      type: "POST",
      url: "searchmodalbyid.php",
      data: { modelId : model_id },
      success:function(data)
      {
        $("#searchBarModel").attr("data-id", model_id)

        $("#searchBarModel").removeClass('d-none')
        $("#searchBarForbrand").hide()

        var response  = JSON.parse(data)
        if (response.status== 200)
        {
          if (argument) 
          {
           $(".rowManufct").fadeOut('fast')
            $("#testauto .responseHere").html(response.data) 
          }
          else
          {
            $("#testauto .responseHere").html('')
            $("#testauto .responseHere").html(response.data)
          }
        }
        else
        {
          $("#testauto .responseHere").html('')
          $("#testauto .responseHere").html("<p> No Model Found</p>")
        }  
      }
    });
  }

  