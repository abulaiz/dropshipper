var objProduct = angular.element('[ng-model=product_id]');
var index;

app.controller('modalOrder' ,function ($scope, $http) {
	$scope.product_default_option = false;
	$scope.product_options = [];
	$scope.jumlahOrder = 0;
	$scope.requested = false;

	$scope.getIndex = function(id){
		for(let i=0; i < $scope.product_options.length; i++){
			if($scope.product_options[i].id == id)
				return i;
		}
	};

	$scope.updatePrice = function(){
		$scope.totalPembayaran = $scope.product_options[ index ].price * $scope.jumlahOrder;  
	};

	$scope.submit = function(e){
		if(!$scope.requested){
			$scope.requested = true;
			e.preventDefault();

			toastr.info('Sedang mengecek stok ...', 'Harap Tunggu!', {
			positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
			$scope.requested = false;

	        $http.post('/api/checkProductAv', {'product_id' : $scope.product_id, 'qty' : $scope.jumlahOrder})
	        .then(function successCallback(response) {
				if(response.data.success){
			      	toastr.success('Pesanan anda akan kami catat.', 'Stok Tersedia!', {
			        positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					document.getElementById('addOrder').submit();	
				} else {
					toastr.warning('Hanya tersedia '+ response.data.available +'.', 'Stok tidak cukup!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$scope.requested = false;
				}
	        }, function errorCallback(response) {
				toastr.error('Terjadi kesalaha, coba lagi.', 'Request Failed!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
				$scope.requested = false;
	        });	
		}
	}

    // Get product list
    $http({
      method: 'GET',
      url: '/api/product/available'
    }).then(function successCallback(response) {
        $scope.product_options = response.data.data;
    });

    objProduct.bind('change', function(e){
    	$scope.product_default_option = true;
		index = $scope.getIndex(this.value);
    	$scope.price = $scope.product_options[ index ].price;
    	$scope.jenisPaket = $scope.product_options[ index ].type;
    	$scope.jumlahOrder = 0;
    });



});