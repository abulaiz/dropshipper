	var Table;	

    app.controller('table', function($scope, $http, $timeout){

    	$scope.datas = [];
    	$scope.d = [];

    	$scope.confirm = function(index, e){
			_confirm(1, function(){
				toastr.info('Sedang mengkonfirmasi order.', 'Harap Tunggu !', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		        $http.post('/api/admin/order/confirm', {'id' : $scope.datas[index].id})
		        .then(function successCallback(response) {
					toastr.success('Order Produk sudah terkonfirmasi.', 'Berhasil !', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		    		Table.row(e.parentNode.parentNode.parentNode).remove().draw( false );
		        }, function errorCallback(response) {
					toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
		        });				
			});    			    		
    	};

    	$scope.reject = function(index, e){
			_confirm(2, function(){
				toastr.info('Sedang membatalkan order.', 'Harap Tunggu !', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		        $http.post('/api/admin/order/reject', {'id' : $scope.datas[index].id})
		        .then(function successCallback(response) {
					toastr.success('Order Produk sudah dibatalkan.', 'Berhasil !', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		    		Table.row(e.parentNode.parentNode.parentNode).remove().draw( false );
		        }, function errorCallback(response) {
					toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
		        });				
			});    			    		
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