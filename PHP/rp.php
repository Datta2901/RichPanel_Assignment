<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing Page</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
</head>
<html>
  <body>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html> -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" rel="stylesheet" /> -->
<?php
    $products = array(
		"product1" => array(
			"title" => "Mobile",
			"price" => 100,
			"features" => array("Quality : Good", "Resolution : 480p", "Supported in Phone","Supported in Tablet","Not Supported in Computer","Not Supported in TV")
		),
		"product2" => array(
			"title" => "Basic",
			"price" => 200,
			"features" => array("Quality : Good", "Resolution : 480p", "Supported in Phone","Supported in Tablet","Supported in Computer","Supported in TV")
		),
		"product3" => array(
			"title" => "Standard",
			"price" => 500,
			"features" => array("Quality : Better", "Resolution : 1080p", "Supported in Phone","Supported in Tablet","Supported in Computer","Supported in TV")
		),
		"product4" => array(
			"title" => "Premium",
			"price" => 700,
			"features" => array("Quality : Best", "Resolution : 4K+HDR", "Supported in Phone","Supported in Tablet","Supported in Computer","Supported in TV")
		)
	);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing Page</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <style type="text/css">
        body{
            background-color: blue;
        }
        .container {
            margin-top: 100px;
        }

        .card {
            width: 300px;
        }

        .card:hover {
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -ms-transform: scale(1.05);
            -o-transform: scale(1.05);
            transform: scale(1.05);
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .list-group-item {
            border: 0px;
            padding: 5px;
        }

        .price {
            font-size: 72px;
        }

        .currency {
            position: relative;
            font-size: 30px;
            top: -31px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
        $colNum = 0;
        foreach ($products as $productID => $attributes) {
            if ($colNum == 0)
                echo '<div class="row">';

            echo '
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2 class="price"><span class="currency">₹</span>'.($attributes['price']).'</h2>
                        </div>
                        <div class="card-body text-center">
                            <div class="card-title">
                                <h2>'.$attributes['title'].'</h2>
                            </div>
                            <ul class="list-group">
                            ';

                            foreach($attributes['features'] as $feature)
                                echo '<li class="list-group-item">'.$feature.'</li>';

                        echo'
                            </ul>
                            <br>
                            <a>Subscribe</a>
                        </div>
                    </div>
                </div>';

            if ($colNum == 2) {
                echo '</div><br>';
                $colNum = 0;
            } else
                $colNum++;
        }
    ?>
</div>
</body>
</html>