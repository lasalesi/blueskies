<?php
	require_once ("../database_connect.php");
	require_once ("phplot.php");
	
	$data = array();
	
	$sql = "SELECT * FROM `top10authors`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{				
			array_push($data, array($row["Author"], $row["Requests"]));			
		}
	} 	
	
	$conn->close();		
	
	/* make plot here */
	$plot = new PHPlot(600,500);
	$plot->SetImageBorderType('plain');

	$plot->SetPlotType('pie');
	$plot->SetDataType('text-data-single');
	$plot->SetDataValues($data);

	# Set enough different colors;
	$plot->SetDataColors(array('red', 'green', 'blue', 'yellow', 'cyan',
							'magenta', 'brown', 'lavender', 'pink',
							'gray', 'orange'));

	# Main plot title:
	$plot->SetTitle("Top 10 authors");

	# Build a legend from our data array.
	# Each call to SetLegend makes one line as "label: value".
	foreach ($data as $row)
	  $plot->SetLegend(implode(': ', $row));
	# Place the legend in the upper left corner:
	$plot->SetLegendPixels(5, 5);

	$plot->DrawGraph();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>MasterControl Upload</title>
  <meta name="description" content="MasterControl upload web application" />
  <meta name="keywords" content="MasterControl Upload" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
</head>

<body>
	  
			<img src="<?php echo $plot->EncodeImage();?>" alt="Plot Image">
  
</body>
</html>
