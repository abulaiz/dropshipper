// Manipulate date
var d = new Date();
var today = d.getFullYear() + '-' 
			+ String(d.getMonth()+1).padStart(2, '0') + '-' 
			+ String(d.getDate()).padStart(2, '0');
var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
				'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

var avatar_colour = ['success', 'info', 'warning', 'indigo', 'cyan', 'teal', 'green', 
						'lime', 'grey', 'orange', 'purple', 'pink', 'blue'];


app.controller('mail' ,function ($scope, $rootScope, $location, $http) {

	$scope.inload = false;

	$scope.readMailState = null;

	$scope.onSending = false;

	$rootScope.readMail = function(state){
		$scope.readMailState = state;
		$location.path('/content');
	};

	$rootScope.getMailState = function(){
		return $scope.readMailState;	
	};	

	$rootScope.$on("$routeChangeStart", function(){
		$scope.inload = true;
	});

	$rootScope.$on("$routeChangeSuccess", function(){
		$scope.inload = false;
	});

	$scope.sentMail = function(){;
      	toastr.info('Sedang mengirim pesan ...', 'Harap Tunggu', {
        positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
        $scope.onSending = true;

	    $http.post('/api/mail/write', {'subject' : $scope.subject, 'text' : $scope.text, 'email' : $scope.email})
	    .then(function successCallback(response) {

	    	if(response.data.success){
		      	toastr.success('Pesan anda telah terkirim', 'Selesai', {
		        positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

		      	$scope.subject = ''; $scope.text = ''; $scope.email = '';
		        $rootScope.loadOutbox(null, null, 1, 'unshift');	    		
		      } else {
		      	toastr.error(response.data.reason, 'Gagal', {
		        positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});			      	
		      }
	

	        $scope.onSending = false;
	    }, function errorCallback(response) {

			toastr.error('Terjadi kesalahan, coba lagi.', 'Request Failed!', {
			positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

			$scope.onSending = false;
	    });			
	}

});