var app= angular.module('myApp',["firebase",'googlechart']);

app.controller('MainController',function($firebaseArray,$scope){

	var ref = new Firebase("https://hackntu-c8663.firebaseio.com/")


	this.dataAll = $firebaseArray(ref.child("dataA"));
	this.dataAll2 = $firebaseArray(ref.child("dataB"));
	this.showDetial = function(){
		// console.log(this.dataAll)

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
	}

	var times = 0;
	ref.on("child_changed", function(snapshot) {
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
				alert("脈搏異常，請注意！\n成人脈搏正常狀況下每分鐘60至100下。")
				times = 0;
			}
			

		}, 5000);
		
	});

});

app.filter('reverse', function() {
  return function(items) {
    return items.slice().reverse();
  };
});