<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php  echo base_url();?>/vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php  echo base_url();?>/vendor/angular-material.min.css">
	<link rel="stylesheet" href="<?php  echo base_url();?>/model.css">
	<script src="https://kit.fontawesome.com/bb93b6c71d.js"></script>
</head>
<body ng-app="myApp" ng-controller="MyController">
	<div class="printout">
		<div class="container">
			<div class="jumbotron">
				<h1 class="display-3 text-xs-center">Member List:</h1>
				<!-- <p>
					<div layout="row" layout-align="space-around">
						<md-button ng-click="showNoticeUpdateSuccessfully()">
							Show Simple
						</md-button>
					</div>
				</p> -->
				<div ng-repeat="member in memberList" ng-init="member.show=true">
					<div class="card" ng-show="!member.show">
						<div class="card-header">
							<b>Information about
								<input type="text" class="form-control" ng-model="member.name">
							</b>
						</div>
						<div class="card-block">							
							<input type="hidden" class="form-control" ng-model = "member.id">
							<b>Age: </b>
							<input type="text" class="form-control" ng-model="member.age">
							<br>
							<b>Facebook: </b>
							<input type="text" class="form-control" ng-model="member.facebook">
							<br>
							<b>Number phone: </b>
							<input type="text" class="form-control" ng-model="member.numberphone">
							<br><br>
							<b class="float-xs-right btn btn-outline-success btn btn-block" 
								ng-click="updatedata(member)"
								ng-click="showNoticeUpdateSuccessfully()">Save</b>
						</div>
					</div>
					<div class="card text-xs-center" ng-show="member.show">
						<div class="card-header">
							<b class="float-xs-right"><i class="fa fa-pencil btn btn-outline-danger" ng-click="editMode(member)"></i></b>
							<b>Information about {{member.name}}:</b>
						</div>
						<div class="card-block">
							<b>Age: </b><i>{{member.age}}</i><br>
							<b>Facebook: </b><i>{{member.facebook}}</i><br>
							<b>Number phone: </b><i>{{member.numberphone}}</i><br><br>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php  echo base_url();?>/vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php  echo base_url();?>/vendor/angular-1.5.min.js"></script>
	<script type="text/javascript" src="<?php  echo base_url();?>/vendor/angular-animate.min.js"></script>
	<script type="text/javascript" src="<?php  echo base_url();?>/vendor/angular-aria.min.js"></script>
	<script type="text/javascript" src="<?php  echo base_url();?>/vendor/angular-material.min.js"></script>
	<script type="text/javascript" src="<?php  echo base_url();?>/vendor/angular-messages.min.js"></script>
	<script type="text/javascript" src="<?php  echo base_url();?>/vendor/angular-route.min.js"></script>
	<script type="text/javascript" src="<?php  echo base_url();?>/model.js"></script>
</body>
</html>