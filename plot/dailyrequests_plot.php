<?php
	require_once ("../database_connect.php");
	require_once ("phplot.php");
	
	$data = array();
	
	$sql = "SELECT * FROM `view_dailyrequestslast3months`";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{				
			array_push($data, array($row["Day"], $row["Requests"]));			
		}
	} 	
	
	$conn->close();		
	
	/* make plot here */
	$plot = new PHPlot(600,500);
	$plot->SetImageBorderType('plain');

	$plot->SetPlotType('bars');
	$plot->SetDataType('text-data');
	$plot->SetDataValues($data);

	# Set enough different colors;
	$plot->SetDataColors(array('blue', 'green', 'red', 'yellow', 'cyan',
							'magenta', 'brown', 'lavender', 'pink',
							'gray', 'orange'));

	# Main plot title:
	$plot->SetTitle("Daily requests (last 3 months)");

	# Build a legend from our data array.
	# Each call to SetLegend makes one line as "label: value".
	#foreach ($data as $row)
	#  $plot->SetLegend(implode(': ', $row));
	# Place the legend in the upper left corner:
	#$plot->SetLegendPixels(5, 5);
	# Make a legend for the 3 data sets plotted:
	$plot->SetLegend(array('Requests'));

	# We want both X axis data labels and X tick labels displayed. They will
	# be positioned in a way that prevents them from overwriting.
	#$plot->SetXDataLabelPos('plotdown');
	#$plot->SetXTickLabelPos('plotdown');

	# No 3-D shading of the bars:
	$plot->SetShading(0);

	# Increase the left and right margins to leave room for weekday labels.
	#$plot->SetMarginsPixels(50, 50);
	# Show tick labels (with dates) at 90 degrees, to fit between the data labels.
	$plot->SetXLabelAngle(90);

	# Turn off X tick labels and ticks because they don't apply here:
	#$plot->SetXTickLabelPos('none');
	#$plot->SetXTickPos('none');

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
