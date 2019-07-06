	var new_unread, tmp;

    app.controller('navbar', function($scope, $http, $timeout, $interval, $rootScope){
    	$scope.logout = function(e){
    		e.preventDefault();
            document.getElementById('logout-form').submit();
    	};
		
    	$scope.unread_message = $("#inbox_badge").text();
    	$scope.has_sidebar_notif = false;

    	$scope.has_unread_message = $scope.unread_message == 0 ? false : true;

    	$scope.onMailBoxPage = false;

    	$scope.carry_unadded_mailbox = 0;

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

					if($scope.onMailBoxPage){
						if($rootScope.mailBoxState == 'mailbox'){
							// tmp += $scope.carry_unadded_mailbox;
							$rootScope.loadInbox(null, null, tmp, 'unshift');
							// $scope.carry_unadded_mailbox = 0;
						} else {
							$scope.carry_unadded_mailbox = tmp;
						}
					}		    		
		    	}
	      		$("#inbox_badge").text( new_unread );
		    	$scope.unread_message = new_unread;
		    	$scope.has_unread_message = $scope.unread_message == 0 ? false : true;	      		
		    });      		
    	}

    	$rootScope.unaddedMail = function(){
			if($rootScope.mailBoxState == 'mailbox' && $scope.carry_unadded_mailbox > 0){
				$rootScope.loadInbox(null, null, $scope.carry_unadded_mailbox, 'unshift');
				$scope.carry_unadded_mailbox = 0;
			}  		
    	}

    	$rootScope.setSidebarBadge = function(){
    		$scope.has_sidebar_notif = true;
    	}

    	$scope.load_inbox();

		$interval(function () {
			$scope.load_inbox();
		}, 6000); // 10 detik
		
		$scope.loadAdminBadge = function(){
		    $http({
		    	method: 'GET',
		    	url: '/api/admin/badge'
		    }).then(function successCallback(response) {
		    	
		    });   
		}

		$timeout(function(){
	    	if(typeof $rootScope.mailBoxState !== 'undefined'){
				$scope.onMailBoxPage = true;		
	    	}
	   		$scope.loadAdminBadge();
		}, 2000);
		


    });
