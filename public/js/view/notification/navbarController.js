	var new_unread, tmp;

    app.controller('navbar', function($scope, $http, $timeout, $interval){
    	$scope.logout = function(e){
    		e.preventDefault();
            document.getElementById('logout-form').submit();
    	};
		
    	$scope.unread_message = $("#inbox_badge").text();

    	$scope.has_unread_message = $scope.unread_message == 0 ? false : true;

    	$scope.load_inbox = function(){
		    // Get product list
		    $http({
		      method: 'GET',
		      url: '/api/unread_inbox'
		    }).then(function successCallback(response) {
		    	new_unread = response.data.data;
		    	if(new_unread > $scope.unread_message){
		    		tmp = new_unread - $scope.unread_message;
					$.ambiance({
						message: 'Anda Mendapat '+ tmp +' pesan baru.',
					    title: 'Pesan baru', timeout: 0,
					    type: "success", fade : true,
					    link : '/email', linkName : 'Cek Sekarang', linkColor: "white"
					});			      			    		
		    	}
	      		$("#inbox_badge").text( new_unread );
		    	$scope.unread_message = new_unread;
		    	$scope.has_unread_message = $scope.unread_message == 0 ? false : true;	      		
		    });      		
    	}

    	$scope.load_inbox();

		$interval(function () {
			$scope.load_inbox();			
		}, 6000); // 10 detik
		
// if (typeof $rootScope.getTodaysSteps !== 'undefined' && typeof $rootScope.getTodaysSteps === 'function') 
// { 
//      ...
// }		

    });