// Temporarial Variable --------------------------------------
var next = false, onSetCourierServices = false;

// Selectize Instatiation --------------------------------
var selectizes = $('.selectizes').selectize({
	sortField: [{field: 'text', direction: 'asc'}]
});
var province = selectizes[0].selectize;
var city = selectizes[1].selectize;
var subdistrict = selectizes[2].selectize;
var country = selectizes[3].selectize;
var courier_service = selectizes[4].selectize;

// FilePond Initiation ---------------------------------------
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

// Additional Function --------------------------------------
function ObjectLength( object ) {
    var length = 0;
    for( var key in object ) {
        if( object.hasOwnProperty(key) ) {
            ++length;
        }
    }
    return length;
}

// 'inputForm' scope controller -------------------------------
app.controller('inputForm', function($scope, $http, $timeout){
	// Initial Angular scope variable ---------------------------
	$scope.onsubmit = false;
	$scope.availableStockCaption = '';
	$scope.product_options = [];
	$scope.product_default_option = false;
	$scope.sender_name = $('[name=defaultSender]').val();
	$scope.bookedByMarketPlace = false;
	$scope.ongkirGratis = false;
	$scope.courier_id = null;
	$scope.order_via_id = null;
	$scope.courier_type = 'domestik';
	$scope.freeCode = '';
	$scope.price = 0;

	// Angular Scope Function --------------------------------------
    $scope.setCourierServices = function(reload = true){
    	if(onSetCourierServices) return;
  
    	$('.courier_service').hide();
		courier_service.clear();
		courier_service.clearOptions();    	
		if(!reload) return;
    	// input validation
    	if($scope.courier_id == null || $scope.product_id == null)
    		return;
    	if($scope.courier_type == 'domestik' && subdistrict.items == '')
    		return;
    	if($scope.courier_type == 'internasional' && country.items == '')
    		return;    	

    	if(!Number.isInteger($scope.qty_sending)){
    		_leftAlert('Oops!', 'Jumlah pengiriman tidak valid.', 'warning');
    		return;
    	} else if ($scope.qty_sending > Number( $("#qty_sending").attr('max') )){
    		_leftAlert('Oops!', 'Jumlah pengiriman melebihi stok.', 'warning');
    		return;
    	}   

    	let index = $scope.getIndex( $scope.product_id );
    	$("#backdrop").show();
    	onSetCourierServices = true;
		$http.post('/api/ongkir/price', {
			type : $scope.courier_type,
			destination : $scope.courier_type == 'domestik' ? subdistrict.items[0] : country.items[0],
			weight : Math.round($scope.product_options[index].qty * $scope.product_options[index].weight),
			courier : $scope.courier_id
		}).then(function successCallback(response) {
			$('.courier_service').show();
			for(let i=0; i < response.data.data.length; i++){
				courier_service.addOption({
					"value" : $scope.courier_type == 'domestik' ? response.data.data[i].cost[0].value : response.data.data[i].cost,
					"text" : $scope.courier_type == 'domestik' ? response.data.data[i].service + " ( " + response.data.data[i].description +" )" : response.data.data[i].service
				});
			}
			$("#backdrop").hide();
			onSetCourierServices = false;

		}, function errorCallback(response) {
			console.log(response.data);
		});	
    }

    $scope.totalPrice = function(){
		x = $scope.price.toString();
		var sisa = x.length % 3;
		if(sisa==0) sisa = 3;
		var b = x.substr(0, sisa);
		for(var i = sisa; i<x.length; i+=3)
		{
			b = b+","+x.substr(i, 3);
		}
		$("#price").text( b + " " + ($scope.courier_type == 'domestik' ? 'IDR' : 'USD') );   	
    }

    $scope.pengirimanDomestik = function(c){
    	province.clear();
    	country.clear();
    	if(c){
    		$scope.courier_type = 'domestik';
    		$('.domestik').show();
    		$('.internasional').hide();
    	} else {
    		$scope.courier_type = 'internasional';
    		$('.domestik').hide();
    		$('.internasional').show();   			    		
    		if(ObjectLength(country.options) == 0){
    			$("#backdrop").show();
			    $http({
			      method: 'GET',
			      url: '/api/ongkir/international'
			    }).then(function successCallback(response) {
			        for(let i=0; i < response.data.data.length; i++){
			        	country.addOption({
			        		"value":response.data.data[i].country_id, 
			        		"text":response.data.data[i].country_name
			        	});
			        }	
			        $("#backdrop").hide();		        
			    });	     			
    		}
    	}
    	$('#fake_courier').click();
		$scope.totalPrice();    	
    }

	$scope.setOrderVia = function(value){
			
		if(value > 3){
			$scope.bookedByMarketPlace = true;
		} else {
			$scope.bookedByMarketPlace = false;
		}

		if($scope.order_via_id > 3 && value <= 3 && $scope.courier_id > 1){
			$('#fake_courier').click();
			$scope.setCourierServices(false);
		}

		$scope.order_via_id = value;
	};

	$scope.setOngkirGratis = function(condition){
		$scope.ongkirGratis = condition;
		if(condition)
			$scope.price = 0;
		else
			$scope.price = courier_service.items == "" ? 0 : courier_service.items;
		$scope.totalPrice();
	};

	$scope.setCourier = function(value = null){
		$scope.courier_id = value;
		if(value == null) return;
		$scope.setCourierServices();
	};

	$scope.getIndex = function(id){
		for(let i=0; i < $scope.product_options.length; i++){
			if($scope.product_options[i].product_id == id)
				return i;
		}
	};
    
	$scope.availableCourier = function(state){
		if(state == '1' && $scope.courier_type == 'domestik')
			return '';
		if(state == '2' && ($scope.bookedByMarketPlace || $scope.courier_type == 'internasional') )
			return '';
		if(state == '3' && $scope.bookedByMarketPlace && $scope.courier_type == 'domestik' )
			return '';
		return 'hidden';
	}	

    $scope.failureValidation = function(text){
    	_leftAlert('Oops !', text, 'error'); 	
    };

    $scope.isEmptyString = function(text){
    	if(text == "" || text == null) return true;
    	else return false;
    }

    $scope.submit = function(){
    	// Validation input logic

    	next = !($scope.product_id == null || $scope.isEmptyString($scope.receiver_address) ||  $scope.isEmptyString($scope.phone_number) );
    	next = next && !( $scope.isEmptyString($scope.receiver_name)  ||  $scope.isEmptyString($scope.sender_name)  || $scope.courier_id == null || $scope.order_via_id == null);
    	next = next && !courier_service.items.length == 0;
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
    		let prv = null, cty = null, subd = null, ctr = null;
    		if($scope.courier_type == 'domestik'){
    			prv = province.getItem(province.getValue()).text();
    			cty = city.getItem(city.getValue()).text();
    			subd = subdistrict.getItem(subdistrict.getValue()).text();
    		} else {
    			ctr = country.getItem(country.getValue()).text();
    		}

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
	        	'province' : prv,
	        	'city' : cty,
	        	'subdistrict' : subd,
	        	'country' : ctr,
	        	'courier_service' : courier_service.getItem(courier_service.getValue()).text(),
	        	'price' : {'p' : $scope.price, 'c' : $scope.courier_type == 'domestik' ? 'IDR' : 'USD'}
	        }).then(function successCallback(response) {
	        	if(response.data.success){
					_leftAlert('Berhasil!', 'Request Pengiriman sudah dikirim.', 'success');
					$timeout(function(){
	        			window.location = '/member/pengiriman';
					}, 1500);
	        	} else {
					_leftAlert('Gagal !', response.data.reason, 'error');
	        		$timeout(function(){
		        		if(response.data.eRtype == 2)
		        			window.location.reload(true); 
	        		});
	        		$scope.onsubmit = false;
	        	}
	        }, function errorCallback(response) {
	        	console.log(response.data);
	        	_leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');
				$scope.onsubmit = false;
	        });	    		

    	} else {
    		return $scope.failureValidation('Silahkan lengkapi formulir isian dengan benar');
    	}
    };

    // Onload Event ----------------------------------------------------
    $("#backdrop").show();
    // Get product list
    $http({
      method: 'GET',
      url: '/api/user/stock'
    }).then(function successCallback(response) {
        $scope.product_options = response.data.data;  
    });	

    // Get List of Province
    $http({
      method: 'GET',
      url: '/api/ongkir/province'
    }).then(function successCallback(response) {
        for(let i=0; i < response.data.data.length; i++){
        	province.addOption({
        		"value":response.data.data[i].province_id, 
        		"text":response.data.data[i].province
        	});
        }
        $("#backdrop").hide();
    });	

    // Selectize Element Event Listener --------------------------------
    province.on('change', function(){
    	city.clear();
    	city.clearOptions();    	
    	if(province.items == "") return;
    	$("#backdrop").show();
	    $http({
	      method: 'GET',
	      url: '/api/ongkir/city/' + province.items
	    }).then(function successCallback(response) {
	        for(let i=0; i < response.data.data.length; i++){
	        	city.addOption({
	        		"value":response.data.data[i].city_id, 
	        		"text":response.data.data[i].type+" "+response.data.data[i].city_name
	        	});
	        }
	        $("#backdrop").hide();
	    });	
    });

    city.on('change', function(){
    	subdistrict.clear();
    	subdistrict.clearOptions();    	
    	if(province.items == "") return;
    	$("#backdrop").show();
	    $http({
	      method: 'GET',
	      url: '/api/ongkir/subdistrict/' + city.items
	    }).then(function successCallback(response) {
	        for(let i=0; i < response.data.data.length; i++){
	        	subdistrict.addOption({
	        		"value":response.data.data[i].subdistrict_id, 
	        		"text":response.data.data[i].subdistrict_name
	        	});
	        }
	        $("#backdrop").hide();
	    });	
    });

    subdistrict.on('change', function(){
    	// alert( subdistrict.getItem(subdistrict.getValue()).text() );
    	$scope.setCourierServices();
    });

    country.on('change', function(){
    	// alert( subdistrict.getItem(subdistrict.getValue()).text() );
    	$scope.setCourierServices();
    });    

    courier_service.on('change', function(){
    	$scope.price = courier_service.items == "" ? 0 : courier_service.items[0];
    	$scope.totalPrice();
    });

    //  JQUERY Event Listener ---------------------------------------
    $("#product_id").change(function(){
    	$scope.product_default_option = true;
		let index = $scope.getIndex(this.value);
		$scope.availableStockCaption = "(Stok yang dimiliki adalah "+ $scope.product_options[index].qty +")";
		$scope.qty_sending = 1;
		$('[ng-model=qty_sending]').attr({'max' : $scope.product_options[index].qty});
		$timeout(function(){
			$scope.setCourierServices();			
		}, 200);
    });

    $("#qty_sending").on('change keyup', function(){
    	$scope.setCourierServices();
    });

});