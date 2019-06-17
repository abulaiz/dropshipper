// Manipulate date
var d = new Date();
var today = d.getFullYear() + '-' 
			+ String(d.getMonth()+1).padStart(2, '0') + '-' 
			+ String(d.getDate()).padStart(2, '0');
var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
				'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

var avatar_colour = ['success', 'info', 'warning', 'indigo', 'cyan', 'teal', 'green', 
						'lime', 'brown', 'orange', 'purple', 'pink', 'blue'];

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
pond.labelIdle = "Klik / seret gambar untuk menyisipkan gambar";
pond.maxFiles = 10;

pond.on('processfile', (error, file) => {
	pond.labelIdle = "Klik untuk menambahkan gambar lagi";
});


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

	$rootScope.setComposeMail = function(subject, receiver = null){
		$scope.subject = subject;
		if(receiver != null){
			$scope.email = receiver;
		}
	}

	$rootScope.$on("$routeChangeStart", function(){
		$scope.inload = true;
	});

	$rootScope.$on("$routeChangeSuccess", function(){
		$scope.inload = false;
	});

	$scope.sentMail = function(){;

        _leftAlert('Harap Tunggu', 'Sedang mengirim pesan ...', 'info');
        $scope.onSending = true;

	    var attachment = [];
	    var x = pond.getFiles();

		for(let i=0; i < x.length; i++){
			if(x[i].status != 5){
				return _leftAlert('Oops !', 'Beberapa gambar belum berhasil diupload, batalkan atau muat ulang', 'warning');
			}
			attachment.push(x[i].serverId);  		
		}

        $("[data-dismiss=modal]").click();

	    $http.post('/api/mail/write', {'subject' : $scope.subject, 'text' : $scope.text, 'email' : $scope.email, 'attachment' : attachment})
	    .then(function successCallback(response) {

	    	if(response.data.success){
	    		_leftAlert('Selesai', 'Pesan anda telah terkirim.', 'success');

		      	$scope.subject = ''; $scope.text = ''; $scope.email = '';
		        $rootScope.loadOutbox(null, null, 1, 'unshift');	
				pond.removeFiles();		
		    } else {
				_leftAlert('Gagal !', response.data.reason, 'error');		      	
		    }
	        $scope.onSending = false;
	    }, function errorCallback(response) {
	    	console.log(response.data);
			_leftAlert('Request Failed !', 'Terjadi kesalahan, coba lagi.', 'error');
			$scope.onSending = false;
	    });	
	    
	    attachment = null;
	    x = null;
	}

});