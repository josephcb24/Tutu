	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData1;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = cost_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv");
	});
	
	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData2;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = value_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv2");
	});
	
	
	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData3;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = loss_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv3");
	});
	
	
	var chart;
	AmCharts.ready(function() {
		// SERIAL CHART
		chart = new AmCharts.AmSerialChart();
		chart.dataProvider = chartData4;
		chart.categoryField = "country";
		chart.startDuration = 1;
	
		// AXES
		// category
		var categoryAxis = chart.categoryAxis;
		categoryAxis.labelRotation = 45; // this line makes category values to be rotated
		categoryAxis.gridAlpha = 0;
		categoryAxis.fillAlpha = 1;
		categoryAxis.fillColor = "#FAFAFA";
		categoryAxis.gridPosition = "start";
	
		// value
		var valueAxis = new AmCharts.ValueAxis();
		valueAxis.dashLength = 5;
		valueAxis.title = pl_txt;
		valueAxis.axisAlpha = 0;
		chart.addValueAxis(valueAxis);
	
		// GRAPH
		var graph = new AmCharts.AmGraph();
		graph.valueField = "visits";
		graph.colorField = "color";
		graph.balloonText = "<b>[[category]]: "+currency+"[[value]]</b>";
		graph.type = "column";
		graph.lineAlpha = 0;
		graph.fillAlphas = 1;
		chart.addGraph(graph);
	
		// CURSOR
		var chartCursor = new AmCharts.ChartCursor();
		chartCursor.cursorAlpha = 0;
		chartCursor.zoomable = false;
		chartCursor.categoryBalloonEnabled = false;
		chart.addChartCursor(chartCursor);
	
		chart.creditsPosition = "top-right";
	
		// WRITE
		chart.write("chartdiv4");
	});
	
	$(document).ready(function() {
		var opts1 = {
			lines: 10, // The number of lines to draw
			angle: 0, // The length of each line
			lineWidth: 0.3, // The line thickness
			pointer: {
				length: 0.45, // The radius of the inner circle
				strokeWidth: 0.035, // The rotation offset
				color: '#242d3c' // Fill color
			},
			limitMax: 'true', // If true, the pointer will not go past the end of the gauge
			colorStart: '#9365b8', // Colors
			colorStop: '#9365b8', // just experiment with them
			strokeColor: '#ddd', // to see which ones work best for you
			generateGradient: true
		};
	
		var opts2 = {
			lines: 10, // The number of lines to draw
			angle: 0, // The length of each line
			lineWidth: 0.3, // The line thickness
			pointer: {
				length: 0.45, // The radius of the inner circle
				strokeWidth: 0.035, // The rotation offset
				color: '#242d3c' // Fill color
			},
			limitMax: 'true', // If true, the pointer will not go past the end of the gauge
			colorStart: '#00a65a', // Colors
			colorStop: '#00a65a', // just experiment with them
			strokeColor: '#ddd', // to see which ones work best for you
			generateGradient: true
		};
	
		var opts3 = {
			lines: 10, // The number of lines to draw
			angle: 0, // The length of each line
			lineWidth: 0.3, // The line thickness
			pointer: {
				length: 0.45, // The radius of the inner circle
				strokeWidth: 0.035, // The rotation offset
				color: '#242d3c' // Fill color
			},
			limitMax: 'true', // If true, the pointer will not go past the end of the gauge
			colorStart: '#303641', // Colors
			colorStop: '#303641', // just experiment with them
			strokeColor: '#ddd', // to see which ones work best for you
			generateGradient: true
		};
	
	
		var target = document.getElementById('gauge1'); // your canvas element
		var gauge = new Gauge(target).setOptions(opts1); // create sexy gauge!
		gauge.maxValue = stock_max; // set max gauge value
		gauge.animationSpeed = 32; // set animation speed (32 is default value)
		gauge.set(stock); // set actual value
		gauge.setTextField(document.getElementById("gauge1-txt"));
		
		var target = document.getElementById('gauge2'); // your canvas element
		var gauge = new Gauge(target).setOptions(opts2); // create sexy gauge!
		gauge.maxValue = sale_max; // set max gauge value
		gauge.animationSpeed = 32; // set animation speed (32 is default value)
		gauge.set(sale); // set actual value
		gauge.setTextField(document.getElementById("gauge2-txt"));
	
		var target = document.getElementById('gauge3'); // your canvas element
		var gauge = new Gauge(target).setOptions(opts3); // create sexy gauge!
		gauge.maxValue = destroy_max; // set max gauge value
		gauge.animationSpeed = 32; // set animation speed (32 is default value)
		gauge.set(destroy); // set actual value
		gauge.setTextField(document.getElementById("gauge3-txt"));
		
		var updateGauge;
		var gaugeSwitch = document.getElementById('auto-gauge1');
		gaugeSwitch.checked = false;
		new Switchery(gaugeSwitch);
	
		gaugeSwitch.onchange = function() {
			if (gaugeSwitch.checked) {
				updateGauge = setInterval(function() {
					gauge.set(activeit.randomInt(1, 1500));
				}, 2000)
			} else {
				clearInterval(updateGauge);
			}
		};
	
		var updateGauge;
		var gaugeSwitch = document.getElementById('auto-gauge2');
		gaugeSwitch.checked = false;
		new Switchery(gaugeSwitch);
	
		gaugeSwitch.onchange = function() {
			if (gaugeSwitch.checked) {
				updateGauge = setInterval(function() {
					gauge.set(activeit.randomInt(1, 1500));
				}, 2000)
			} else {
				clearInterval(updateGauge);
			}
		};
	
		var updateGauge;
		var gaugeSwitch = document.getElementById('auto-gauge3');
		gaugeSwitch.checked = false;
		new Switchery(gaugeSwitch);
	
		gaugeSwitch.onchange = function() {
			if (gaugeSwitch.checked) {
				updateGauge = setInterval(function() {
					gauge.set(activeit.randomInt(1, 1500));
				}, 2000)
			} else {
				clearInterval(updateGauge);
			}
		};
	
	});
	google.load('maps', '3', {
		other_params: 'sensor=false'
	});
	
	google.setOnLoadCallback(initialize);
	
	var styles = [
		[{
			url: '../images/conv30.png',
			height: 27,
			width: 30,
			anchor: [3, 0],
			textColor: '#ff00ff',
			opt_textSize: 10
		}, {
			url: '../images/conv40.png',
			height: 36,
			width: 40,
			opt_anchor: [6, 0],
			opt_textColor: '#ff0000',
			opt_textSize: 11
		}, {
			url: '../images/conv50.png',
			width: 50,
			height: 45,
			opt_anchor: [8, 0],
			opt_textSize: 12
		}],
		[{
			url: '../images/heart30.png',
			height: 26,
			width: 30,
			opt_anchor: [4, 0],
			opt_textColor: '#ff00ff',
			opt_textSize: 10
		}, {
			url: '../images/heart40.png',
			height: 35,
			width: 40,
			opt_anchor: [8, 0],
			opt_textColor: '#ff0000',
			opt_textSize: 11
		}, {
			url: '../images/heart50.png',
			width: 50,
			height: 44,
			opt_anchor: [12, 0],
			opt_textSize: 12
		}]
	];
	
	var markerClusterer = null;
	var markerClusterer1 = null;
	var map = null;
	var map1 = null;
	var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&' +
		'chco=FFFFFF,008CFF,000000&ext=.png';
	
	function refreshMap() {
		//if (markerClusterer) {
		//  markerClusterer.clearMarkers();
		//}
	
		var markers = [];
		var markers1 = [];
		var infoWindows = [];
		var infoWindows1 = [];
	
		var markerImage = new google.maps.MarkerImage(imageUrl,
			new google.maps.Size(24, 32));
	
	
		var bound = new google.maps.LatLngBounds();
		// Loop through our array of markers & place each one on the map  
		for (i = 0; i < sale_details.length; i++) {
			var latLng = new google.maps.LatLng(sale_details[i][1], sale_details[i][2])
			var marker = new google.maps.Marker({
				position: latLng,
				draggable: false,
				icon: markerImage,
				animation: google.maps.Animation.DROP,
				infoWindowIndex: i
			});
	
			bound.extend(new google.maps.LatLng(sale_details[i][1], sale_details[i][2]));
	
			var content = '<div class="info_content">' +
				'<h3>' + sale_details[i][0] + '</h3>' +
				'<p>' + sale_details[i][3] + '</p>' +
				'</div>';
	
			var infoWindow = new google.maps.InfoWindow({
				content: content
			});
	
			google.maps.event.addListener(marker, 'click',
				function(event) {
					infoWindows[this.infoWindowIndex].open(map, this);
				}
			);
	
			infoWindows.push(infoWindow);
			markers.push(marker);
		}
	
		var bound1 = new google.maps.LatLngBounds();
		// Loop through our array of markers & place each one on the map  
		for (i = 0; i < sale_details1.length; i++) {
			var latLng = new google.maps.LatLng(sale_details1[i][1], sale_details1[i][2])
			var marker = new google.maps.Marker({
				position: latLng,
				draggable: false,
				icon: markerImage,
				animation: google.maps.Animation.DROP,
				infoWindowIndex: i
			});
	
			bound1.extend(new google.maps.LatLng(sale_details1[i][1], sale_details1[i][2]));
	
			var content = '<div class="info_content">' +
				'<h3>' + sale_details1[i][0] + '</h3>' +
				'<p>' + sale_details1[i][3] + '</p>' +
				'</div>';
	
			var infoWindow = new google.maps.InfoWindow({
				content: content
			});
	
			google.maps.event.addListener(marker, 'click',
				function(event) {
					infoWindows1[this.infoWindowIndex].open(map1, this);
				}
			);
	
			infoWindows1.push(infoWindow);
			markers1.push(marker);
		}
	
	
		var zoom = parseInt(16);
		var size = parseInt(40);
		var style = parseInt(-1);
	
		markerClusterer = new MarkerClusterer(map, markers, {
			maxZoom: zoom,
			gridSize: size,
			styles: styles[style]
		});
	
		markerClusterer1 = new MarkerClusterer(map1, markers1, {
			maxZoom: zoom,
			gridSize: size,
			styles: styles[style]
		});
	
		//map.setCenter(bound.getCenter())
		//map1.setCenter(bound1.getCenter())
		map.fitBounds(bound);
		map1.fitBounds(bound1);
	}
	
	function initialize() {
		map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: new google.maps.LatLng(23.91, 90.38),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	
		map1 = new google.maps.Map(document.getElementById('map1'), {
			zoom: 4,
			center: new google.maps.LatLng(23.91, 90.38),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	
		refreshMap();
	}
	
	function clearClusters(e) {
		e.preventDefault();
		e.stopPropagation();
		markerClusterer.clearMarkers();
	}