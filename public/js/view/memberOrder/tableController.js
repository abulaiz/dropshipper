
    app.controller('table', function($scope, $http, $timeout){

    	$scope.datas = [];

	    // Get product list
	    $http({
	      method: 'GET',
	      url: '/api/user/order'
	    }).then(function successCallback(response) {
	        $scope.datas = response.data;
			$('.table-responsive').show();
			$('#table-loader').hide();	        
	        $timeout(function(){     	
				$('#example').DataTable( {
				    rowReorder: {
				        selector: 'td:nth-child(2)'
				    },
				    responsive: true
				});	
	        }, 50);       
	    });

    });