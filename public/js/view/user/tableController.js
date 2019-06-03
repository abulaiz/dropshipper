var Table;

app.controller('table', function($scope, $http, $timeout){

    	$scope.datas = [];
    	// $scope.datas2 = [];

	   	$scope.edituser = function(index){
		    $http.post('/api/user/edituser', {'id' : $scope.datas[index].id})
		    // var edituser=$.param({'password':$scope.password});
		        .then(function successCallback(response){
		            alert(response.data['msg']);
		        },function errorCallback(response) {
		            alert(response.data['msg']);
		        });
		    }

    	$scope.delete = function(index){ 		
				toastr.info('Sedang membatalkan order ...', 'Harap Tunggu!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
				$scope.requested = false;

		        $http.post('/api/user/delete', {'id' : $scope.datas[index].id})
		        .then(function successCallback(response) {
		        	toastr.remove();
					toastr.info('Data Pengguna telah dihapus.', 'Berhasil!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$scope.requested = false;
					$scope.loadData();
		        }, function errorCallback(response) {
		        	toastr.remove();
					toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$scope.requested = false;
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
		      url: '/api/user'
		    }).then(function successCallback(response) {
		        $scope.datas = response.data.res1
				$('.table-responsive').show();
				$('#table-loader').hide();	        
		        $timeout(function(){     	
					Table = $('#example').DataTable();	
		        }, 50);       
		    });    		
    	}

    	$scope.loadData();
    });
