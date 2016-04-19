	var app = angular.module('angCrud',[]);

	app.controller('angcrudCtrl', function($scope, $http, $log) {
		/*Messages*/
		$scope.suc_msg="";
		$scope.err_msg="";
		/*Messages*/

		$scope.datas=[];
		$scope.id="-1";
		
		$scope.showAll = function() {
			$http.get("angcrud/get_all").success(function(response) {
				$scope.datas=response;
			});
		}

		$scope.if_exist_phone = function() {
			$http.post('angcrud/save_verified_data', {
		    				'id': $scope.id,
	                        'fname' : $scope.fname,
				            'place' : $scope.place,
				            'phone' : $scope.phone,
				            'mail' : $scope.mail,
				            'gend' : $scope.gend
					        }
				    ).success(function (data, status, headers, config) {
				    		$scope.showAll();
				    	
				    		$scope.id="-1";
		    	  			$scope.fname="";
							$scope.place="";
							$scope.phone="";
							$scope.mail="";
							$scope.gend="";
				    });
		}

		$scope.selectTo_update = function(id) {
			$http.post('angcrud/selectTo_update', {
			            'id' : id,
			            
			        }
		    ).success(function (data, status, headers, config) {
		    				$scope.id=data.id;
		    				$scope.fname=data.name;
							$scope.place=data.place;
							$scope.phone=data.phone;
							$scope.mail=data.email;
							$scope.gend=data.gender;
		    });
		}

		$scope.delData = function(id) {
			if(confirm("Sure to Delete?")) {
				$http.post('angcrud/delete_data', {
				            'id' : id
				        }
			    ).success(function (data, status, headers, config) {
			    	$scope.showAll();
			    });
			}
		}

		
	});