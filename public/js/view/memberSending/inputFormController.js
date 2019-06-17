var objProduct = angular.element('[ng-model=product_id]');
var next = false;

FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType
);

FilePond.setOptions({
    server: {
        url: '/fileUpload',
        process: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }                   
        },
    }
});

const inputElement = document.querySelector('input[type="file"]');
var pond = FilePond.create( inputElement, {acceptedFileTypes: ['image/png']} );
            pond.labelTapToUndo = '';
pond.allowRevert = false;

app.controller('inputForm', function($scope, $http, $timeout){
	$scope.onsubmit = false;

	$scope.availableStockCaption = '';
	$scope.product_options = [];
	$scope.product_default_option = false;
	$scope.sender_name = $('[name=defaultSender]').val();

	$scope.bookedByMarketPlace = false;
	$scope.ongkirGratis = false;

	$scope.courier_id = null;
	$scope.order_via_id = null;

	$scope.freeCode = '';

	$scope.setOrderVia = function(value){
		$scope.order_via_id = value;	
		if(value > 3){
			$scope.bookedByMarketPlace = true;
		} else {
			$scope.bookedByMarketPlace = false;
			$('#customRadio1').click();
		}
	};

	$scope.setOngkirGratis = function(condition){
		$scope.ongkirGratis = condition;
	};

	$scope.setCourier = function(value){
		$scope.courier_id = value;
	};

	$scope.getIndex = function(id){
		for(let i=0; i < $scope.product_options.length; i++){
			if($scope.product_options[i].product_id == id)
				return i;
		}
	};
    
    // Get product list
    $http({
      method: 'GET',
      url: '/api/user/stock'
    }).then(function successCallback(response) {
        $scope.product_options = response.data.data;  
    });		

    objProduct.bind('change', function(e){
    	$scope.product_default_option = true;
		index = $scope.getIndex(this.value);
		$scope.availableStockCaption = "(Stok yang dimiliki adalah "+ $scope.product_options[index].qty +")";
		$scope.qty_sending = 1;
		$('[ng-model=qty_sending]').attr({'max' : $scope.product_options[index].qty});
    });

    $scope.failureValidation = function(text){
		toastr.error(text, 'Oops !', {
		positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});    	
    };

    $scope.submit = function(){
    	// Validation input logic
    	next = !($scope.receiver == '' || $scope.product_id == '' || $scope.receiver_address == '' || $scope.phone_number == '' );
    	next = next && !($scope.receiver_name == '' || $scope.sender_name == '' || $scope.courier_id == null || $scope.order_via_id == null);
    	if(next){
    		// Validation input level 2
    		if($scope.bookedByMarketPlace){
    			if(pond.getFile(0) == null) {
    				return $scope.failureValidation('Sertakan Bukti Pemesanan via Market Place');
    			} else {
	    			if(pond.getFile(0).status != 5){
	    				return $scope.failureValidation('Bukti Pemesanan belum berhasil diupload');
	    			}    				
    			}
    		}

    		if($scope.ongkirGratis && $scope.freeCode == ''){
    			return $scope.failureValidation('Sertakan Kode booking untuk pengiriman gratis');
    		}

    		// If can reach section thats mean validation success
    		$scope.onsubmit = true;
	        $http.post('/api/member/sending', {
	        	'product_id' : $scope.product_id,
	        	'courier_id' : $scope.courier_id,
	        	'qty' : $scope.qty_sending,
	        	'order_via_id' : $scope.order_via_id,
	        	'free_code' : ($scope.ongkirGratis ? $scope.freeCode : null),
	        	'attachment' : $scope.bookedByMarketPlace ? pond.getFile(0).serverId : null,
	        	'sender_name' : $scope.sender_name,
	        	'receiver_name' : $scope.receiver_name,
	        	'phone_number' : $scope.phone_number,
	        	'address' : $scope.receiver_address,
	        	'destination' : $scope.destination
	        }).then(function successCallback(response) {
	        	if(response.data.success){
					toastr.success('Request Pengiriman sudah dikirim.', 'Berhasil !', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$timeout(function(){
	        			window.location = '/member/pengiriman';
					}, 1500);
	        	} else {
					toastr.error(response.data.reason, 'Gagal !', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
	        		$timeout(function(){
		        		if(response.data.eRtype == 2)
		        			window.location.reload(true); 
	        		});
	        		$scope.onsubmit = false;
	        	}
	        }, function errorCallback(response) {
	        	console.log(response.data);
				toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
				$scope.onsubmit = false;
	        });	    		

    	} else {
    		return $scope.failureValidation('Silahkan lengkapi formulir isian dengan benar');
    	}
    };

});