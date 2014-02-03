<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0;" />
    <meta name="author" content="Mukul Kant">
    <title>Sell Textbooks</title>
    <link href="css/masterM.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<script>

  function validateFrom()
  {
	if ($('#ibnnumber').val()!='')
	{
		if (isNaN($('#ibnnumber').val() / 1) == false)
		{			
			if($('#ibnnumber').val().length==10 || $('#ibnnumber').val().length==13)
			{
				$("#isbnSearch").submit(); 
			}
			else
			{
				$("#error").text("Please check number should be of 10 or 13 digit !");
			}
			
		}
		else
		{
			$("#error").text("Please enter numeric value!");
		}
	}
	else
	{
		$("#error").text("Please Enter ISBN !");
	}	
 }
	/*
 $(document).ready(function(){	
	$("#isbnSearch").validate({
        // Specify the validation rules
        rules: {          
            ibnnumber: {
                required: true,
                number: true
            }
        },
		messages: 
			{
			 ibnnumber: 
			 {
				required:"Please Enter ISBN",
				number: "Please enter numeric value"
				}
			}
   });
      });*/
</script>
<body>
<div class="main">
	<h2>Sell Textbooks</h2>
    <h3>We compare 15+ buyback sites to find the HIGHEST price</h3>
	<form id="isbnSearch" name="isbnSearch" action="sellit.php" method="post">
		<input type="text" placeholder="Enter ISBN" class="searchBox" name="ibnnumber" id="ibnnumber" /><label id="error" style="color:red"></label><br/><br/>
		<div class="btnWrap">
			<span><img src="images/magnify.png"></span>
			<input type="button" value="Search Prices" class="searchBTn" onclick="validateFrom();">
		</div>  
	</form>	
</div>
</body>
</html>
