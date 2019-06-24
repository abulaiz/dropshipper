var Table;
	
app.controller('table', function($scope, $http, $timeout){

	$scope.datas = [];

	$scope.reject = function(index){
		_confirm(0, function(){		
			_leftAlert('Harap Tunggu', 'Sedang menghapus akun ...', 'info');
	        $http.post('/api/user/delete', {'id' : $scope.datas[index].id})
	        .then(function successCallback(response) {
	        	_leftAlert('Berhasil !', 'Akun telah dihapus', 'info');
				$scope.loadData();
	        }, function errorCallback(response) {
	        	console.log(response.data);
	        	_leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');
	        });
		}, "Data akan dihapus secara permanen");
	}

	$scope.confirm = function(index){
		_confirm(1, function(){		
			
			_leftAlert('Harap Tunggu', 'Sedang mengaktifkan akun ...', 'info');
	        $http.post('/api/activateUser', {'id' : $scope.datas[index].id})
	        .then(function successCallback(response) {
	        	_leftAlert('Berhasil !', 'Akun telah diaktifkan', 'info');
				$scope.loadData();
	        }, function errorCallback(response) {
	        	console.log(response.data);
	        	_leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');
	        });

		}, "Akun ini akan diaktifkan");
	}

	$scope.loadData = function(){
		$('.table-responsive').hide();
		$('#table-loader').show();
        
        if ( $.fn.DataTable.isDataTable('#example') ){
           $('#example').DataTable().destroy();    
        }

	    $http({
	      method: 'GET',
	      url: '/api/registrant'
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
