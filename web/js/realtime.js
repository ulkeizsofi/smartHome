var dataPoints=[];
var time = 0;

function updateChartTemp(value){
	var limit = 10;    //increase number of dataPoints by increasing the limit
	var y = 0;
	time+=1;
	var data = [];
	var dataSeries = { type: "line" };
		y = value;
		dataPoints.push({
			x: time,
			y: y
		});

	if (time > limit){
		dataPoints.shift();
	}
	
	dataSeries.dataPoints = dataPoints;
	data.push(dataSeries);

	//Better to construct options first and then pass it as a parameter
	var options = {
		zoomEnabled: false,
                animationEnabled: false,
		title: {
			text: "Temperature"
		},
		axisX: {
			labelAngle: 30
		},
		axisY: {
			includeZero: false
		},
		data: data  // random data
	};

	$("#tempChart").CanvasJSChart(options);

}

function updateChartHumid(value){
	var limit = 10;    //increase number of dataPoints by increasing the limit
	var y = 0;
	time+=1;
	var data = [];
	var dataSeries = { type: "line" };
		y = value;
		dataPoints.push({
			x: time,
			y: y
		});

	if (time > limit){
		dataPoints.shift();
	}
	
	dataSeries.dataPoints = dataPoints;
	data.push(dataSeries);

	//Better to construct options first and then pass it as a parameter
	var options = {
		zoomEnabled: false,
                animationEnabled: false,
		title: {
			text: "Humidity"
		},
		axisX: {
			labelAngle: 30
		},
		axisY: {
			includeZero: false
		},
		data: data  // random data
	};

	$("#humidChart").CanvasJSChart(options);

}

function drawChartTemp(){
	try{
		var socket_name = prompt("Socket name:","ws://IP:PORT/");
		var websocket = new WebSocket(socket_name);
		websocket.onmessage = function (e){
		updateChartTemp(parseFloat(e.data));
		}
	}catch(e){ 
    
		$("#tempChart").innerHtml = "Connection not established";
	
 
  	}
}


function drawChartHumid(){
	try{
		var socket_name = prompt("Socket name:","ws://IP:PORT/");
		var websocket = new WebSocket(socket_name);
		websocket.onmessage = function (e){
		updateChartHumid(parseFloat(e.data));
		}
	}catch(e){ 
    
		$("#humidChart").innerHtml = "Connection not established";
	
  	}
}

function btnClickRealTimeTemp(){
	$(this).hide();
	drawChartTemp();
}

function btnClickRealTimeHumid(){
	$(this).hide();
	drawChartHumid();
}

function createButtonTemp(){
	var btn = $("<button>").attr("class","btn btn-primary temp");
	btn.html("Add termperature chart!");
	btn.on("click",btnClickRealTimeTemp);
	console.log(btn);
	$("#tempChart.temp").append(btn);
}

function createButtonHumid(){
	var btn = $("<button>").attr("class","btn btn-primary humid");
	btn.html("Add humidity chart!");
	btn.on("click",btnClickRealTimeHumid);
	console.log(btn);
	$("#humidChart.humid").append(btn);
}