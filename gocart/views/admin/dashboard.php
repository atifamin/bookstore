<style>

.bar-chart-css{
	position:absolute;
}

.main{
	margin-bottom:10%;
}

</style>
<div class="main">
<div class="row">
<div class="col-md-6">
<div id="columnchart_material" class="bar-chart-css" style="width: 600px; height: 250px;"></div>


</div>
<div class="col-md-6">

<div id="columnchart_material1" class="bar-chart-css" style="width: 600px; height: 300px;right:30px;"></div>
</div>
</div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(drawChart1);

  function drawChart() {
	var data = google.visualization.arrayToDataTable([
	  ['', 'Approved', 'Completed', 'Cancelled'],
	  ['Jan', 1000, 400, 200],
	  ['Feb', 1170, 460, 250],
	  ['March', 660, 1120, 300],
	  ['April', 1030, 540, 350],
	  ['May', 1030, 540, 350],
	  ['June', 1030, 540, 350]
	]);

	var options = {
	  chart: {
		title: 'Orders By Status',
		subtitle: 'Last 6 Months Analysis',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

	chart.draw(data, google.charts.Bar.convertOptions(options));
  }
  
  
  function drawChart1() {
	var data = google.visualization.arrayToDataTable([
	  ['', 'Customers'],
	  ['2014', 1000],
	  ['2015', 1170],
	  ['2016', 660],
	  ['2017', 1030]
	]);

	var options = {
	  chart: {
		title: 'Customers',
		subtitle: 'Last 6 Months Analysis',
	  }
	};

	var chart = new google.charts.Bar(document.getElementById('columnchart_material1'));

	chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>