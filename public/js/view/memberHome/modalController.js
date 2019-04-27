var objProduct = angular.element('[ng-model=product_id]');
var index;

app.controller('modalOrder' ,function ($scope, $http) {
	$scope.product_default_option = false;
	$scope.product_options = [];
	$scope.jumlahOrder = 0;

	$scope.getIndex = function(id){
		for(let i=0; i < $scope.product_options.length; i++){
			if($scope.product_options[i].id == id)
				return i;
		}
	};

	$scope.updatePrice = function(){
		$scope.totalPembayaran = $scope.product_options[ index ].price * $scope.jumlahOrder;  
	};

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