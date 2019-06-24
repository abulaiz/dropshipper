	var status_flag = {
		'1' : 'Menunggu Konfirmasi Harga',
		'2' : 'Menunggu Pembayaran',
		'3' : 'Pembayaran Dikonfirmasi',
		'4' : 'Barang Telah Terkirim',
	};
	var Table;

    app.controller('statusSending', function($scope, $http, $timeout){

    	$scope.datas = [];
    	$scope.d = [];

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
						{'href' : '/sendingAttachment/'+ response.data.id + '/' + response.data.attachment_path})
					;
					// initPhotoSw();		    		
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
	      url: '/api/member/sending'
	    }).then(function successCallback(response) {
	        $scope.datas = response.data;
			$('.table-responsive').show();
			$('#table-loader').hide();	        
	        $timeout(function(){     	
				Table = $('#example').DataTable({
							"order": [[ 0, 'asc' ], [4, 'desc']]						
						});	
	        }, 50);       
	    });    		



    });