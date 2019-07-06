	var status_flag = {
		'1' : 'Menunggu Pembayaran',
		'2' : 'Pembayaran Dikonfirmasi'
	};

	var current_index;

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
		    	if(response.data.attachment_path != ""){
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

    	$scope.reject = function(index, e){ 		
			_confirm(3, function(){
				toastr.info('Sedang membatalkan pengirman ...', 'Harap Tunggu!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		        $http.post('/api/sending/reject', {'id' : $scope.datas[index].id})
		        .then(function successCallback(response) {
		        	toastr.remove();
					toastr.info('Pengiriman telah dibatalkan.', 'Berhasil!', {
					positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
					$scope.loadData();
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

   		$scope.statusStyle = function(status){
   			if(status == '2') return 'background-color : #37bc9b; color: white;';
   			else return '';
   		}

		$scope.loadData = function(){
			$('.table-responsive').hide();
			$('#table-loader').show();

            if ( $.fn.DataTable.isDataTable('#example') ){
               $('#example').DataTable().destroy();    
            }
	        
		    $http({
		      method: 'GET',
		      url: '/api/admin/sending'
		    }).then(function successCallback(response) {
		        $scope.datas = response.data;
				$('.table-responsive').show();
				$('#table-loader').hide();	        
		        $timeout(function(){     	
		        	$('#example').DataTable({ order : [[ 5, 'asc' ], [ 0, 'desc' ]] });
		        }, 50);       
		    });  			
		}  		

	    $scope.changeStatus = function(index, status){
	        $http.post('/api/sending/changeStatus', {'id' : $scope.datas[index].id, 'status' : status})
	        .then(function successCallback(response) {
	        	toastr.remove();
				toastr.info('Status telah diupdate.', 'Berhasil!', {
				positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
				$scope.loadData();
	        }, function errorCallback(response) {
	        	console.log(response.data);
	        	alert('Server Error');
	        });	
	    };

	    $scope.sended = function(index){
	    	$scope.changeStatus(index, '3');
	    };

	    $scope.payed = function(index){
	    	$scope.changeStatus(index, '2');
	    };

	    $scope.cetak = function(index){
	    	window.open('/resiPengiriman/' + $scope.datas[index].id);
	    };

	    $scope.loadData();

    });