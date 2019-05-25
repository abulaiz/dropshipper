	var Table;	

    app.controller('table', function($scope, $http, $timeout){

    	$scope.datas = [];
    	$scope.d = [];

    	$scope.confirm = function(index, e){

    		// Table.row(e.parentNode.parentNode.parentNode).remove().draw( false );
    	};

    	$scope.details = function(index){
    		$('#detail-loader').show();
    		$('.hd').hide();
		    $http({
		      method: 'GET',
		      url: '/api/admin/orderDetail/' + $scope.datas[index].id
		    }).then(function successCallback(response) {
		    	$scope.d = response.data;
	    		$('#detail-loader').hide();
	    		$('.hd').show();
		    });     		
    	};

    	$scope.loadData = function(){
			$('.table-responsive').hide();
			$('#table-loader').show();
            
            if ( $.fn.DataTable.isDataTable('#example') ){
               $('#example').DataTable().destroy();    
            }

		    $http({
		      method: 'GET',
		      url: '/api/admin/orderRequest'
		    }).then(function successCallback(response) {
		        $scope.datas = response.data;
				$('.table-responsive').show();
				$('#table-loader').hide();	        
		        $timeout(function(){     	
					Table = $('#example').DataTable();	
		        }, 50);       
		    });    		
    	}

    	$scope.loadData();

    });