<!DOCTYPE HTML>
<html ng-app="myApp">
	<head>
		<title>長期病患生理監控系統</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


		<script type="text/javascript" src="assets/js/angular.min.js"></script>
		<script type="text/javascript" src="assets/js/firebase.js"></script>
		<script type="text/javascript" src="assets/js/angularfire.min.js"></script>

		<!-- unminified for development -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-google-chart/0.1.0/ng-google-chart.js" type="text/javascript"></script>

		<!-- minified for production -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-google-chart/0.1.0/ng-google-chart.min.js" type="text/javascript"></script>
		
		<script type="text/javascript" src="assets/js/app.js"></script>


		<script language="JavaScript">
			function ShowTime(){
			　var NowDate=new Date();
			　var y = NowDate.getFullYear();
			　var mon = NowDate.getMonth() + 1;
			　var day = NowDate.getDate();　
			　var h = NowDate.getHours();
			　var m = NowDate.getMinutes();
			　var s = NowDate.getSeconds();　
			　document.getElementById('showbox').innerHTML = y + '年' + mon + '月' + day +  '日' + h + '時' + m + '分' + s + '秒';
			　setTimeout('ShowTime()',1000);
			}
		</script>
	</head>
	<body ng-controller="MainController as main" onload="ShowTime()">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
<!-- 					<header id="header">
						殘疾病人生理監控系統
					</header> -->

				<!-- Main -->
					<section id="main">
						<div class=top>
							<h3>長期病患生理監控系統</h3>
						</div>
						<h2>► 即時資訊 ◄</h2>
						<span id="showbox"></span>
						<!-- Thumbnails -->
							<section class="thumbnails">

								<div class = "box">
									脈搏<br>
									<span class=info>{{main.dataAll[main.dataAll.length-1].data1}}</span>
									<h2>每分</h2>
								</div>
								<div class = "box">
									血氧<br>
									<span class=info>{{main.dataAll[main.dataAll.length-1].data2}}</span>
									<h2>%</h2>
								</div class = "box">
								<div class = "box">
									血流量<br>
									<span class=info>{{main.dataAll[main.dataAll.length-1].data3}}</span>
								</div>
<!-- 								<div class = "box">
									血壓<br>
									
								</div> -->
							</section>
					</section>
					
					<div class=wave>
						<hr>
						<h2>► 波型圖 ◄</h2>					
						<div class=row>
							<section class=6u>
								<h1>脈搏</h1>
								<div class=wavebox>
									<div google-chart chart="main.chartObject" style="height:100%; width:90%;"></div>
								</div>
							</section>
							<section class=6u>
								<h1>血氧</h1>
								<div class=wavebox>
									<div google-chart chart="main.chartObject2" style="height:100%; width:90%;"></div>
								</div>
							</section>
						</div>
						<div class=row>
							<section class=6u>
								<h1>血流量</h1>
								<div class=wavebox>
									<div google-chart chart="main.chartObject3" style="height:100%; width:90%;"></div>
								</div>
							</section>
							<section class=6u>
								<!-- Trigger the modal with a button -->
								<br><br><br><br><br><br><br><br><br><br>
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" ng-click="main.showDetial()">詳細資料</button>

								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
								    <div class="modal-dialog">
									    <!-- Modal content-->
									    <div class="modal-content">
									    	<div class="modal-header">
									    		<button type="button" class="close" data-dismiss="modal">&times;</button>
									    		<h4 class="modal-title">詳細資料</h4>
									        </div>
									        <div class="modal-body">
									        	<p>
													<table>
														<tr>
															<td>時間</td><td>脈搏(每分)</td><td>血氧 (%)</td><td>血流量</td>
														</tr>
														<tr ng-repeat="d in main.dataAll | reverse">
															<td>
																{{d.$id.split("")[0]}}{{d.$id.split("")[1]}}{{d.$id.split("")[2]}}{{d.$id.split("")[3]}}/{{d.$id.split("")[4]}}{{d.$id.split("")[5]}}/{{d.$id.split("")[6]}}{{d.$id.split("")[7]}}
																{{d.$id.split("")[8]}}{{d.$id.split("")[9]}}:{{d.$id.split("")[10]}}{{d.$id.split("")[11]}}:{{d.$id.split("")[12]}}{{d.$id.split("")[13]}}
															</td>															
															<td>
																{{d.data1}}
															</td>
															<td>
																{{d.data2}}
															</td>
															<td>
																{{d.data3}}
															</td>
														</tr>
														</table>
									        	</p>
									        </div>
									        <div class="modal-footer">
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        </div>
									    </div>
								    </div>
								</div>
							</section>
						</div>
					</div>
					{{main.createChart()}}
				<!-- Footer -->
					<footer id="footer">
						<font color=#666666>&copy; 曹永忠, 陳奕文, 簡漢君, 郭俊志 for hackNTU 2016. All rights reserved.</font>
					</footer>


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>