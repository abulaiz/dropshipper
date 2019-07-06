app.controller('sidebar', function($scope, $http, $rootScope){
	
	$scope.order = 0;
	$scope.sending = 0;
	$scope.user = 0;

	$scope.has_order = false;
	$scope.has_sending = false;
	$scope.has_user = false;

	$scope._has_order = function(){
		return $scope.has_order ? 'badge-show' : '';
	}

	$scope._has_sending = function(){
		return $scope.has_sending ? 'badge-show' : '';
	}

	$scope._has_user = function(){
		return $scope.has_user ? 'badge-show' : '';
	}	

	$scope.__has_order = function(){
		return $scope.has_order ? 'sb-unread' : 'sb-readed';
	}

	$scope.__has_sending = function(){
		return $scope.has_sending ? 'sb-unread' : 'sb-readed';
	}

	$scope.__has_user = function(){
		return $scope.has_user ? 'sb-unread' : 'sb-readed';
	}

    $http({
      method: 'GET',
      url: '/api/admin/badge'
    }).then(function successCallback(response) {
		$scope.order = response.data.order;
		$scope.sending = response.data.sending;
		$scope.user = response.data.user;

		if($scope.order > 0 || $scope.sending > 0 || $scope.user > 0)
			$rootScope.setSidebarBadge();

		$scope.has_order = $scope.order > 0 ? true : false;
		$scope.has_sending = $scope.sending > 0 ? true : false;
		$scope.has_user = $scope.user > 0 ? true : false;
    });   

});
