	var status_flag = {
		'1' : 'Menunggu Pembayaran',
		'2' : 'Pembayaran Dikonfirmasi',
		'3' : 'Barang telah dikirim',
		'4' : 'Pengiriman ditolak',
	};

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

    	$scope.cancel = function(index, deleted = false){ 		
			_confirm(3, function(){
				toastr.info('Sedang membatalkan pengirman ...', 'Harap Tunggu!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		        $http.post('/api/sending/cancel', {'id' : $scope.datas[index].id})
		        .then(function successCallback(response) {
		        	toastr.remove();
					toastr.info(deleted ? 'Data pengiriman berhasil dihapus.' : 'Pengiriman telah dibatalkan.', 'Berhasil!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$scope.loadData();
		        }, function errorCallback(response) {
		        	toastr.remove();
		        	console.log(response.data);
					toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
		        });					
			}, deleted ? "Setelah dihapus data tidak bisa dipulihkan." : null);
    	}

   		$scope.viewStatus = function(status){
   			return status_flag[status]; 
   		}

   		$scope.statusStyle = function(status){
   			if(status == '1') return '';
   			else if(status == '2') return 'background-color : #3bafda; color: white;';
   			else if(status == '3') return 'background-color : #37bc9b; color: white;';
   			else if(status == '4') return 'background-color : #da4453; color: white;';
   		}

		$('.table-responsive').hide();
		$('#table-loader').show();
        
        $scope.loadData = function(){
            if ( $.fn.DataTable.isDataTable('#example') ){
               $('#example').DataTable().destroy();    
            }        	
		    $http({
		      method: 'GET',
		      url: '/api/member/sending'
		    }).then(function successCallback(response) {
		        $scope.datas = response.data;
				$('.table-responsive').show();
				$('#table-loader').hide();	        
		        $timeout(function(){     	
					$('#example').DataTable({"order": [[ 1, 'desc' ], [4, 'desc']]});	
		        }, 50);       
		    });   
        }
 		$scope.loadData();

    });