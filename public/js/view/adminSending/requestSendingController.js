	var status_flag = {
		'1' : 'Menunggu Konfirmasi Harga',
		'2' : 'Menunggu Pembayaran',
		'3' : 'Pembayaran Dikonfirmasi',
		'4' : 'Barang Telah Terkirim',
	};
	var Table;
	var current_index;

	new Cleave('.money', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    }); 	

	function toFomattedNumber(x)
	{
		x = x.toString();
		var sisa = x.length % 3;
		if(sisa==0) sisa = 3;
		var b = x.substr(0, sisa);
		for(var i = sisa; i<x.length; i+=3)
		{
			b = b+","+x.substr(i, 3);
		}
		return b;
	}	

	function getValueOf(x)
	{
		var s = x.split(',');
		var r = "";
		for(var i=0; i<s.length; i++){
			r += s[i];
		}
		return Number(r);
	}

    app.controller('statusSending', function($scope, $http, $timeout){

    	$scope.datas = [];
    	$scope.d = [];

    	$scope.berat = 0;
    	$scope.total_harga = '0';
    	$scope.price_per_kg = 0;

    	$scope.input = function(index){
    		current_index = index;
    		$scope.berat = ( Math.round( ($scope.datas[index].berat * $scope.datas[index].jumlah) / 1000 ) );

    	};

    	$scope.setTotal = function(index){
    		$scope.total_harga = toFomattedNumber($scope.berat * getValueOf($scope.price_per_kg));
    	}

    	$scope.detail = function(index){
    		$('#detail-loader').show();
    		$('.hd').hide();
		    $http({
		      method: 'GET',
		      url: '/api/sending/detail/' + $scope.datas[index].id
		    }).then(function successCallback(response) {
		    	$scope.d = response.data;
		    	if(response.data.attachment_path == ""){
		    		$("#img-instance").hide();
		    	} else {
					$("#img-instance").show();
					$("#img").attr({'src' : '/sendingAttachment/'+ response.data.id + '/' + response.data.attachment_path});		    		
					$( document.getElementById('img').parentNode ).attr(
						{'href' : '/sendingAttachment/'+ response.data.id + '/' + response.data.attachment_path}
					);		    		
		    	}		    	
	    		$('#detail-loader').hide();
	    		$('.hd').show();
		    });     		
    	};

    	$scope.round = function(e){
    		return Math.round(e);
    	};

    	$scope.cancel = function(index, e){ 		
			_confirm(3, function(){
				toastr.info('Sedang membatalkan pengirman ...', 'Harap Tunggu!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		        $http.post('/api/sending/cancel', {'id' : $scope.datas[index].id})
		        .then(function successCallback(response) {
		        	toastr.remove();
					toastr.info('Pengiriman telah dibatalkan.', 'Berhasil!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					Table.row(e.parentNode.parentNode.parentNode.parentNode).remove().draw( false );
		        }, function errorCallback(response) {
		        	toastr.remove();
		        	console.log(response.data);
					toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
		        });					
			});
    	}

   		$scope.viewStatus = function(status){
   			return status_flag[status]; 
   		}

		$('.table-responsive').hide();
		$('#table-loader').show();
        
	    $http({
	      method: 'GET',
	      url: '/api/admin/sending'
	    }).then(function successCallback(response) {
	        $scope.datas = response.data;
			$('.table-responsive').show();
			$('#table-loader').hide();	        
	        $timeout(function(){     	
				Table = $('#example').DataTable({
							"order": [[ 0, 'asc' ], [5, 'desc']]						
						});	
	        }, 50);       
	    });    		

	    $scope.kirim = function(){
	    	var cc = Number( current_index.toString() );
	        $http.post('/api/sending/priceUpdate', {'id' : $scope.datas[current_index].id, 'harga' : $scope.price_per_kg})
	        .then(function successCallback(response) {
	        	toastr.remove();
				toastr.info('Biaya telah dikirim.', 'Berhasil!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
				$scope.datas[cc].status = '2';
	        }, function errorCallback(response) {
	        	console.log(response.data);
	        	alert('Server Error');
	        });		    	
	    }

	    $scope.changeStatus = function(index, status){
	        $http.post('/api/sending/changeStatus', {'id' : $scope.datas[index].id, 'status' : status})
	        .then(function successCallback(response) {
	        	toastr.remove();
				toastr.info('Status telah diupdate.', 'Berhasil!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
				$scope.datas[index].status = status;
	        }, function errorCallback(response) {
	        	console.log(response.data);
	        	alert('Server Error');
	        });	
	    };

	    $scope.sended = function(index){
	    	$scope.changeStatus(index, '4');
	    };

	    $scope.payed = function(index){
	    	$scope.changeStatus(index, '3');
	    };

	    $scope.cetak = function(index){
	    	window.open('/resiPengiriman/' + $scope.datas[index].id);
	    };

    });