<!DOCTYPE HTML>
<html ng-app="myApp">
	<head>
		<title>長期病患生理監控系統 | 總監控</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>



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
	<body id="p2" ng-controller="MainController as main" onload="ShowTime()">


		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
<!-- 					<header id="header">
						殘疾病人生理監控系統
					</header> -->

				<!-- Main -->
					<section id="main">
						<div class=nav>
							<a href="index.php">監控一</a> <a href="index2.php">監控二</a> <span class=active><a href="index3.php">總監控</a></span>
						</div>
						<div class=top>
							<h3>長期病患生理監控系統</h3>
						</div>
						<h2>► 異常資訊整理 ◄</h2>
						<span id="showbox"></span>
						<br><br><br>
						<div class=row>
							<section class=6u><br>
								<b><font color="#6633cc" size="5px">1、脈搏小於60、大於100</font></b><br>
								<b><font color="#6633cc" size="5px">2、血氧濃度低於80%</font></b><br>
								<b><font color="#6633cc" size="5px">3、呼吸順暢度異常</font></b><br><br>
								<!-- <div google-chart chart="main.chartObject5" style="height:100%; width:100%;"></div> -->
							</section>
							<section class=6u>
								<br><br><br><br><br><br><br><br><br><br><br>
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" ng-click="main.showDetial()">詳細資料</button>

								<!-- Modal -->
								<div class="modal fade" id="myModal2" role="dialog">
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
															<td>時間</td><td>呼吸順暢度</td>
														</tr>
														<tr ng-repeat="d in main.gsr | reverse | limitTo:499:0">
															<td>
																{{d.time.split("")[0]}}{{d.time.split("")[1]}}{{d.time.split("")[2]}}{{d.time.split("")[3]}}/{{d.time.split("")[4]}}{{d.time.split("")[5]}}/{{d.time.split("")[6]}}{{d.time.split("")[7]}}
																{{d.time.split("")[8]}}{{d.time.split("")[9]}}:{{d.time.split("")[10]}}{{d.time.split("")[11]}}:{{d.time.split("")[12]}}{{d.time.split("")[13]}}
															</td>															
															<td>
																{{d.value}}
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
					</section>
					
				<!-- Footer -->
					<footer id="footer">
						<font color=#666666>Delevoped by 曹永忠, 陳奕文, 簡漢君, 郭俊志 &copy; hackNTU 2016</font>
					</footer>


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>