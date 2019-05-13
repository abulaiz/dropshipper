// Initialization Variable

// Inbox Flag State
var last_inbox_id = null;
var last_sent_id = null;

// Sent Flag State
var last_inbox_file = null;
var last_sent_file = null;

// temporarial logical variable
var tmp_i, tmp_j;
var tmp_inbox = [], tmp_sent = [];

// Controller Area
app.controller('mailbox', function ($scope, $http, $rootScope){
	$scope.tabs = function(){
		$('.tabInbox').toggleClass('active');
		$('.tabSent').toggleClass('active');
	};
	
	$scope.inbox_data = tmp_inbox;
	$scope.sent_data = tmp_sent;

	$scope.avatarColour = function(flag, name){
		if(flag == 'A')
			return 'bg-primary';
		else if(flag == 'S')
			return 'bg-danger';
		else 
			return 'bg-' + avatar_colour[ Math.floor((name[0].toUpperCase().charCodeAt(0)-1)/2) - 32 ];
	};

	$scope.getDate = function(created_at){
		var x = created_at.split(' ');
		if(x[0] == today)
			return x[1];
		else 
			return x[0].substr(8, 2) +' '+ month[Number(x[0].substr(5, 2)) - 1];
	};

	$scope.loadInbox = function(id = last_inbox_id, file = last_inbox_file, count = null){
		$http.post('/api/mail', {'type' : 'inbox', 'last_id' : id, 'last_file' : file, 'count' : count})
		.then(function successCallback(response) {
			for(tmp_i = 0; tmp_i < response.data.data.length; tmp_i++){
				$scope.inbox_data.push( response.data.data[tmp_i] );
			}
			last_inbox_id = response.data.data[tmp_i-1].id;
			last_inbox_file = response.data.data[tmp_i-1].file;
		}, function errorCallback(response) {
			toastr.error('Terjadi kesalaha, coba lagi.', 'Request Failed!', {
			positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
			$scope.requested = false;
		});	
	};

	// type = 'push' / 'unshift'
	$rootScope.loadOutbox = function(id = last_sent_id, file = last_sent_file, count = null, type = 'push'){
		$http.post('/api/mail', {'type' : 'sent', 'last_id' : id, 'last_file' : file, 'count' : count})
		.then(function successCallback(response) {
			alert( JSON.stringify( response.data ) );
			for(tmp_j = 0; tmp_j < response.data.data.length; tmp_j++){
				if(type == 'push')
					$scope.sent_data.push( response.data.data[tmp_j] );
				else
					$scope.sent_data.unshift( response.data.data[tmp_j] );
			}
			if(type == 'push'){
				last_sent_id = response.data.data[tmp_j-1].id;
				last_sent_file = response.data.data[tmp_j-1].file;
			}
		}, function errorCallback(response) {
			toastr.error('Terjadi kesalaha, coba lagi.', 'Request Failed!', {
			positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
			$scope.requested = false;
		});	
	};

	$scope.read = function(index, type){
		if(type == 'inbox'){
			$rootScope.readMail($scope.inbox_data[index]);
			$scope.inbox_data[index].readed = true;
		}
		else{
			$rootScope.readMail($scope.sent_data[index]);
			$scope.sent_data[index].readed = true;
		}
	};

	$scope.delete = function(){
		alert('tuhka n');
	};

	if(tmp_inbox.length == 0)
		$scope.loadInbox();

	if(tmp_sent.length == 0)
		$rootScope.loadOutbox();
});