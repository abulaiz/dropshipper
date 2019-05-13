
    app.controller('table', function($scope, $http, $timeout){

    	$scope.datas1 = [];
    	$scope.datas2 = [];

    	$scope.anu = function(){
				toastr.info('Sedang membatalkan order ...', 'Harap Tunggu!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});    		
    	};

    	$scope.cancel = function(index){ 		
			_confirm(0, function(){
				toastr.info('Sedang membatalkan order ...', 'Harap Tunggu!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
				$scope.requested = false;

		        $http.post('/api/user/order/cancel', {'id' : $scope.datas1[index].id})
		        .then(function successCallback(response) {
		        	toastr.remove();
					toastr.info('Order telah dibatalkan.', 'Berhasil!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$scope.requested = false;
					$scope.loadData();
		        }, function errorCallback(response) {
		        	toastr.remove();
					toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$scope.requested = false;
		        });					
			});
    	}

    	$scope.loadData = function(){
			$('.table-responsive').hide();
			$('#table-loader').show();
            
            if ( $.fn.DataTable.isDataTable('#example') ){
               $('#example').DataTable().destroy();    
            }

		    $http({
		      method: 'GET',
		      url: '/api/user/order'
		    }).then(function successCallback(response) {
		        $scope.datas1 = response.data.res1;
		        $scope.datas2 = response.data.res2;
				$('.table-responsive').show();
				$('#table-loader').hide();	        
		        $timeout(function(){     	
					$('#example').DataTable( {
					    responsive: true
					});	
		        }, 50);       
		    });    		
    	}

    	$scope.loadData();

    });