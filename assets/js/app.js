var app= angular.module('myApp',["firebase",'googlechart']);

app.controller('MainController',function($firebaseArray,$scope){

	var ref = new Firebase("https://hackntu-c8663.firebaseio.com/")
	var refA = new Firebase("https://hackntu-c8663.firebaseio.com/dataA/")
	var refB = new Firebase("https://hackntu-c8663.firebaseio.com/dataB/")

	this.dataAll = $firebaseArray(ref.child("dataA"));
	this.dataAll2 = $firebaseArray(ref.child("dataB"));
	this.gsr = $firebaseArray(ref.child("gsrArr"));



	// select GSR
	selectGSR = function(obj){
		var tempArr1 = [];
		var isCont = false;
		for (var i = 0; i < obj.length - 2; i++) {
			if ( obj[i + 1].data6 == 1 && obj[i + 2].data6 == 1){
				tempArr1[tempArr1.length] = {
					'time' : obj[i].$id,
					'value' : obj[i].data4,
				}
			}else if( obj[i + 1].data6 == 1 && obj[i + 2].data6 != 1 ){
				tempArr1[tempArr1.length] = {
					'time' : obj[i].$id,
					'value' : obj[i].data4,
				}
				tempArr1[tempArr1.length] = {
					'time' : obj[i + 1].$id,
					'value' : obj[i + 1].data4,
				}				
			}
		};
		console.log(tempArr1)
		ref.child("gsrArr").set(tempArr1);
	}

	// chart
	this.chartObject = {};

	    this.chartObject.data = {"cols": [
	        {id: "t", label: "Time", type: "string"},
	        {id: "s", label: "Value", type: "number"}
	    	], "rows": [

	    ]};
	    this.chartObject.type = "LineChart";
	    this.chartObject.options = {
	        // 'title': 'How Much Pizza I Ate Last Night'
	        legend: { position: "none" },
	    };
	this.chartObject2 = {};

	    this.chartObject2.data = {"cols": [
	        {id: "t", label: "Time", type: "string"},
	        {id: "s", label: "Value", type: "number"}
	    	], "rows": [

	    ]};
	    this.chartObject2.type = "LineChart";
	    this.chartObject2.options = {
	        // 'title': 'How Much Pizza I Ate Last Night'
	        legend: { position: "none" },
	    };

	this.chartObject3 = {};

	    this.chartObject3.data = {"cols": [
	        {id: "t", label: "Time", type: "string"},
	        {id: "s", label: "Value", type: "number"}
	    	], "rows": [

	    ]};
	    this.chartObject3.type = "LineChart";
	    this.chartObject3.options = {
	        // 'title': 'How Much Pizza I Ate Last Night'
	        legend: { position: "none" },
	    };	    

	this.chartObject4 = {};

	    this.chartObject4.data = {"cols": [
	        {id: "t", label: "Time", type: "string"},
	        {id: "s", label: "Value", type: "number"}
	    	], "rows": [

	    ]};
	    this.chartObject4.type = "LineChart";
	    this.chartObject4.options = {
	        // 'title': 'How Much Pizza I Ate Last Night'
	        legend: { position: "none" },
	    };

	this.chartObject5 = {};

	    this.chartObject5.data = {"cols": [
	        {id: "t", label: "Time", type: "string"},
	        {id: "s", label: "Value", type: "number"}
	    	], "rows": [

	    ]};
	    this.chartObject5.type = "LineChart";
	    this.chartObject5.options = {
	        // 'title': 'How Much Pizza I Ate Last Night'
	        legend: { position: "none" },
	    };
    this.createChart = function(){

	    for (var i = 0; i < this.dataAll.length; i++) {
			this.chartObject.data.rows[i] = 
	        {c: [
	            {v: " "},
	            {v: this.dataAll[i].data1},
	        ]};
			this.chartObject2.data.rows[i] = 
	        {c: [
	            {v: " "},
	            {v: this.dataAll[i].data3},
	        ]};
			this.chartObject3.data.rows[i] = 
	        {c: [
	            {v: " "},
	            {v: this.dataAll[i].data2},
	        ]};
	    };

	}
    this.createChart2 = function(){

	    for (var i = 0; i < this.dataAll2.length; i++) {
			this.chartObject4.data.rows[i] = 
	        {c: [
	            {v: " "},
	            {v: this.dataAll2[i].data4},
	        ]};
	    };
	    for (var i = 0; i < this.gsr.length; i++) {
			this.chartObject5.data.rows[i] = 
	        {c: [
	            {v: this.gsr[i].time.split("")[8] + this.gsr[i].time.split("")[9] + ":" + this.gsr[i].time.split("")[10] + this.gsr[i].time.split("")[11] + ":" + this.gsr[i].time.split("")[12] + this.gsr[i].time.split("")[13]},
	            {v: this.gsr[i].value},
	        ]};
	    };
	}

	var times = 0;
	refA.on("child_changed", function(snapshot) {
		this.dataAll = $firebaseArray(ref.child("dataA"));
		setTimeout(function() {

			
			if ( this.dataAll[this.dataAll.length-1].data1 < 60 ){
				times = times + 1;
			}else if( this.dataAll[this.dataAll.length-1].data1 > 100  ){
				times = times + 1;
			}else{
				times = 0;
			}
			if ( times >= 9 ){
				// alert("脈搏異常，請注意！\n成人脈搏正常狀況下每分鐘60至100下。")
				console.log("脈搏異常")
				times = 0;
			}
		
		}, 5000);
		
	});
	refB.on("child_changed", function(snapshot) {
		this.dataAll2 = $firebaseArray(ref.child("dataB"));
		setTimeout(function() {
			selectGSR(this.dataAll2)
		}, 5000);
		
	});
});

app.filter('reverse', function() {
  return function(items) {
    return items.slice().reverse();
  };
});