var Table;

app.controller('table', function($scope, $http, $timeout){

    	$scope.datas = [];
    	$scope.details = [];
    	$scope.name = "";
    	// $scope.datas2 = [];
    	$scope.active_index = null;

    	$scope.show_modal_edit_user = function(index){
    		$scope.active_index = index;
    	}

	   	$scope.edituser = function(){   
			_confirm(1, function(){		
		   		$("#close").click();
		   		_leftAlert('Harap Tunggu', 'Sedang mengganti password ...', 'info');		
			    $http.post('/api/user/update_password', {'id' : $scope.datas[$scope.active_index].id, 'password' : $("#password").val()})
		        .then(function successCallback(response){
		            _leftAlert('Berhasil !', 'Password berhasil diganti.', 'info');
		            $("#password").val("");
		        },function errorCallback(response) {
		            console.log(response.data);
		            _leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');
		        });
			}, "Perubahan password akan dilakukan");	        
		}

    	$scope.delete = function(index){ 
    		_confirm(0, function(){			
    			_leftAlert('Harap Tunggu', 'Sedang menghapus akun ...', 'info');
				$scope.requested = false;
		        $http.post('/api/user/delete', {'id' : $scope.datas[index].id})
		        .then(function successCallback(response) {
		        	_leftAlert('Berhasil !', 'Akun telah dihapus', 'info');
					$scope.requested = false;
					$scope.loadData();
		        }, function errorCallback(response) {
		        	_leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');
					$scope.requested = false;
		        });
		    }, "Akun ini akan dihapus secara permanen");
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
		        $scope.datas = response.data.res1;
				$('.table-responsive').show();
				$('#table-loader').hide();	        
		        $timeout(function(){     	
					Table = $('#example').DataTable();	
		        }, 50);       
		    });    		
    	}

    	$scope.loadData();

    	$scope.order_history = function(index){
    		$scope.name = $scope.datas[index].name;
    		$("#detail-loader").show();
    		$(".hd").hide();
		    $http({
		      method: 'GET',
		      url: '/api/user/historyOrder/' + $scope.datas[index].id
		    }).then(function successCallback(response) {
		    	$(".hd").show();
		        $scope.details = response.data;
		        $("#detail-loader").hide();
		    });      		
    	}

});
