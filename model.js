var	app = angular.module('myApp', ['ngMaterial']);
app.controller('MyController', function ($scope, $http) {
	$scope.contentText = "Enter text here!"
	$scope.showTextBox = true;
	// $scope.showEditMode	= true;
	$scope.toogleTextBox = function(){
		$scope.showTextBox = !$scope.showTextBox;
	}
	$scope.editMode = function(member){
		member.show = !member.show;
	}

	$http.get("http://localhost/angular_php/index.php/welcome/getdata")
	.then(function(response) {
		$scope.memberList = response.data;
		console.log(response.data);
	});
	
	$scope.updatedata = function(member){
		member.show = !member.show;

		var data = $.param({
		id:member.id,
		name:member.name,
		age:member.age,
		facebook:member.facebook,
		numberphone:member.numberphone
		});
		var	config = {
			headers: {
				'content-type':'application/x-www-form-urlencoded; charset=UTF-8'
			}
		}
		
		$http.post('http://localhost/angular_php/index.php/welcome/updatedata', data, config).then(function(response){
			if(response.data == "Success"){
				console.log("Update Data Successfull!");
			}			
		}, function(response){
			if(response.data == "Fail"){
				console.log("Update Data Failure!")
			}
		});
	}
/*	$scope.memberList = [
		{
			name:"Thi",
			age:"24",
			facebook:"fb.com/thinguyen",
			numberphone:"0915727441"
		},
		{
			name:"Son",
			age:"24",
			facebook:"fb.com/sontran",
			numberphone:"0915723324"
		},
		{
			name:"Nhi",
			age:"22",
			facebook:"fb.com/nhihoang",
			numberphone:"0336727441"
		},
		{
			name:"Cuong",
			age:"26",
			facebook:"fb.com/cuongdola",
			numberphone:"0915123441"
		}
	];*/
})