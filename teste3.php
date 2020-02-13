<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var options = {
	animationEnabled: true,
	title: {
		text: "Annual Salary Range - UK"
	},
	axisY: {
		title: "Annual Salary (in British Pound)",
		prefix: "£",
		interval: 35000
	},
	data: [{
		type: "boxAndWhisker",
		upperBoxColor: "#68D46F",
		lowerBoxColor: "#8062EF",
		color: "black",
		yValueFormatString: "£#,##0",
		dataPoints: [
			{ label: "Data Scientist", y: [26109, 30000, 46000, 59119, 38455] },
			{ label: "Web Developer", y: [16734, 20000, 31000, 37167, 24901] },
			{ label: "System Analyst", y: [20964, 25000, 38000, 45238, 30060] },
			{ label: "Application Engineer", y: [20176, 24000, 34000, 39821, 29035] },
			{ label: "Aerospace Engineer", y: [22255, 26000, 40000, 52153, 31935] },
			{ label: "Research Scientist", y: [21555, 26000, 35000, 40517, 30178] }
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>
