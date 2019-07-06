var	app = angular.module('myApp', ['ngMaterial']);
app.controller('MyController', function ($scope, $http, $mdToast, $log) {
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
				$scope.showNoticeUpdateSuccessfully();
			}			
		}, function(response){
			if(response.data == "Fail"){
				console.log("Update Data Failure!");
				$scope.showNoticeUpdateFailure();
			}
		});
	}

	var last = {
	    bottom: true,
	    top: false,
	    left: false,
	    right: true
	};

	$scope.toastPosition = angular.extend({}, last);

	$scope.getToastPosition = function() {
		sanitizePosition();

		return Object.keys($scope.toastPosition)
		.filter(function(pos) {
			return $scope.toastPosition[pos];
		}).join(' ');
	};

	function sanitizePosition() {
		var current = $scope.toastPosition;

		if (current.bottom && last.top) {
			current.top = false;
		}
		if (current.top && last.bottom) {
			current.bottom = false;
		}
		if (current.right && last.left) {
			current.left = false;
		}
		if (current.left && last.right) {
			current.right = false;
		}

		last = angular.extend({}, current);
	};

	$scope.showNoticeUpdateSuccessfully = function() {
		var pinTo = $scope.getToastPosition();

		$mdToast.show(
			$mdToast.simple()
			.textContent('Update Data Succesfull!')
			.position(pinTo)
			.hideDelay(1000))
		.then(function() {
			$log.log('Toast dismissed.');
		})
		.catch(function() {
			$log.log('Toast failed or was forced to close early by another toast.');
		});
	};

	$scope.showNoticeUpdateFailure = function() {
		var pinTo = $scope.getToastPosition();

		$mdToast.show(
			$mdToast.simple()
			.textContent('Update Data Failure!')
			.position(pinTo)
			.hideDelay(1000))
		.then(function(){
			$log.log('Toast dismissed.')
		})
		.catch(function(){
			$log.log('Toast failed or was forced to close eraly by another toast.')
		});
	};
})