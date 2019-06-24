	var Table;	
	var active_index;
	var tmp_qty;

    app.controller('table', function($scope, $http, $timeout){

    	$scope.datas = [];

    	$scope.last_updated = '-';
    	$scope.product_name = '';

    	$scope.loadData = function(){
			$('.table-responsive').hide();
			$('#table-loader').show();
            
            if ( $.fn.DataTable.isDataTable('#example') ){
               $('#example').DataTable().destroy();    
            }

		    $http({
		      method: 'GET',
		      url: '/api/product/stock'
		    }).then(function successCallback(response) {
		        $scope.datas = response.data.data;
		        $scope.last_updated = response.data.last_updated.date.substr(0, 19);
				$('.table-responsive').show();
				$('#table-loader').hide();	        
		        $timeout(function(){     	
					Table = $('#example').DataTable();	
		        }, 50);       
		    });    		
    	}

    	$scope.prep_add = function(index){
    		active_index = index;
    		$scope.product_name = $scope.datas[index].name;
    	}

    	$scope.add = function(){
			_confirm(4, function(){		
				
				tmp_qty = $("#qty").val();
				_leftAlert('Harap Tunggu', 'Sedang menambahkan ...', 'info');
		        $("#close").click();
		        $("#qty").val(1);

		        $http.post('/api/product/add', {'id' : $scope.datas[active_index].id, 'qty' : tmp_qty})
		        .then(function successCallback(response) {

		        	if(response.data.success){
			        	_leftAlert('Berhasil !', 'Data berhasil ditambahkan', 'success');
			      		$scope.datas[active_index].qty += Number(tmp_qty);
			      		$scope.datas[active_index].in += Number(tmp_qty);		        		
		        	} else {
		        		_leftAlert('Request Failed!', 'Terjadi kesalahan input', 'error');
		        	}


		        }, function errorCallback(response) {

		        	console.log(response.data);
		        	_leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');

		        });
			}, "Mutasi penambahan stok tidak bisa diubah di lain waktu.");    		
    	}

    	$scope.loadData();

    });