<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0;" />
    <meta name="author" content="Mukul Kant">
    <title>Sell Textbooks</title>
    <link href="css/masterM.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
	
</head>
<body>
		<?php
			$result=array();
			$url ="http://www.shelfflip.com/getsalesprice.php?isbn=".$_POST['ibnnumber'];
			$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',
			);
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  //for updating we have to use PUT method.
			$result = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			$result=json_decode($result,true);
		?>
    <div class="main">
		<div class="header">
        	<span>
            	<a href="">Search</a>
            </span>
            <h4>
            	Sell it
            </h4>
        </div>  
		
		<div class="product">
        	<img width="60px" height="85px;" src="<?php echo $result['image'];?>" alt="">
            <div class="detatails">
                <p class="bold"><?php echo $result['title'];?></p>
                <p> <?php if(isset($result['author'])){ echo 'BY ' . $result['author']; }?> </p>
            </div>
            <div class="clr"></div>
        </div>
        <div class="listitem">
        	<ul>
			<?php $i=0;
			 foreach($result['shops'] as $bookList) { $i++; ?>
            	<li>
                	<label>
                        <input type="radio" id="author<?php echo $i;?>" name="author">
                        <span><?php echo $bookList['shop_name'];?></span>
                        <span class="alignright">$<?php echo $bookList['price'];?></span>
                    </label>
                </li>
			<?php } ?>	
            </ul>
        </div>
		<?php
		if($result['title']!='Product does not exist') :?>
        <input type="submit" value="Sell right now >>" class="yellowBTn" onclick="location.href='http://packbackbooks.com';">
		<?php endif;?>  
    </div>    
</div>
</body>
</html>
