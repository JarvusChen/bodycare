var app= angular.module('myApp',["firebase",'googlechart']);

app.controller('MainController',function($firebaseArray,$scope){

	var ref = new Firebase("https://hackntu-c8663.firebaseio.com/")


	this.dataAll = $firebaseArray(ref.child("data"));
	this.showDetial = function(){
		console.log(this.dataAll)
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



});

app.filter('reverse', function() {
  return function(items) {
    return items.slice().reverse();
  };
});