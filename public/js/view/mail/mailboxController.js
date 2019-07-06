// Initialization Variable

// Inbox Flag State
var last_inbox_id = null;
var last_sent_id = null;

// Sent Flag State
var last_inbox_file = null;
var last_sent_file = null;

// temporarial logical variable
var tmp_i, tmp_j;
var next_inbox = true, next_sent = true;
var tmp_inbox = [], tmp_sent = [];
var selected_mails = [];
var activeTab = true;
var tmp_delete = [];
var on_search = false;

// Controller Area
app.controller('mailbox', function ($scope, $http, $rootScope, $timeout){
	$scope.inbox_data = tmp_inbox;
	$scope.sent_data = tmp_sent;
	$scope.onSelectedMail = false;

	$scope.activeSelectedFlag = null; // diisi oleh 'inbox' atau 'sent'
	$scope.onDeleteting = false;	
	$scope.inboxTabActivate = activeTab;
	$scope.tmp_search = '';
	$scope.timer;

	$rootScope.mailBoxState = 'mailbox';

	$rootScope.unaddedMail();

	$scope.resetSelected = function(){
		for(let i=0; i < selected_mails.length; i++){
			$("#aV"+$scope.activeSelectedFlag+'-'+selected_mails[i]).click();
		}
	};

	$scope.resetSearch = function(type){
		if(type == "inbox"){
			$scope.inbox_data = tmp_inbox;
		} else {
			$scope.sent_data = tmp_sent;
		}
		
		$('.email-app-list').show();
		$("#"+ type +"-loader").hide();
		on_search = false;				
	}

	$scope.tabs = function(){
		$scope.resetSearch( $scope.inboxTabActivate ? 'inbox' : 'sent' );
		$('.search-f').val('');

		$scope.inboxTabActivate = !$scope.inboxTabActivate;
		activeTab = $scope.inboxTabActivate;
		$scope.resetSelected();
	};
	
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

	// type = 'push' / 'unshift'
	$rootScope.loadInbox = function(id = last_inbox_id, file = last_inbox_file, count = null, type = 'push'){
		if(type == 'push')
			$("#inbox-loader").show();
		$http.post('/api/mail', {'type' : 'inbox', 'last_id' : id, 'last_file' : file, 'count' : count})
		.then(function successCallback(response) {
			for(tmp_i = 0; tmp_i < response.data.data.length; tmp_i++){
				if(type == 'push')
					$scope.inbox_data.push( response.data.data[tmp_i] );
				else
					$scope.inbox_data.unshift( response.data.data[tmp_i] );				
			}
			if(type == 'push'){
				if(response.data.data.length > 0){
					last_inbox_id = response.data.data[tmp_i-1].id;
					last_inbox_file = response.data.data[tmp_i-1].file;
				}
				next_inbox = response.data.next;
				$("#inbox-loader").hide();				
			}
		}, function errorCallback(response) {
			_leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');
			$scope.requested = false;
		});	
	};

	// type = 'push' / 'unshift'
	$rootScope.loadOutbox = function(id = last_sent_id, file = last_sent_file, count = null, type = 'push'){
		if(type == 'push')
			$("#sent-loader").show();

		$http.post('/api/mail', {'type' : 'sent', 'last_id' : id, 'last_file' : file, 'count' : count})
		.then(function successCallback(response) {
			for(tmp_j = 0; tmp_j < response.data.data.length; tmp_j++){
				if(type == 'push')
					$scope.sent_data.push( response.data.data[tmp_j] );
				else
					$scope.sent_data.unshift( response.data.data[tmp_j] );
			}
			if(type == 'push'){
				if(response.data.data.length > 0){
					last_sent_id = response.data.data[tmp_j-1].id;
					last_sent_file = response.data.data[tmp_j-1].file;					
				}
				next_sent = response.data.next;
				$("#sent-loader").hide();
			}
		}, function errorCallback(response) {
			_leftAlert('Request Failed!', 'Terjadi kesalahan', 'error');
			console.log(response.data);
			$scope.requested = false;
		});	
	};

	$scope.read = function(index, type){
		$scope.resetSelected();
		if(type == 'inbox'){
			$rootScope.readMail($scope.inbox_data[index]);
			$scope.inbox_data[index].readed = true;
		}
		else{
			$rootScope.readMail($scope.sent_data[index]);
			$scope.sent_data[index].readed = true;
		}
	};

	if(tmp_inbox.length == 0)
		$rootScope.loadInbox();

	if(tmp_sent.length == 0)
		$rootScope.loadOutbox();

	$scope.select = function(e, index, flag){
		if(on_search){
			_leftAlert('Maaf', 'Tidak bisa memilih pesan saat mode pencarian', 'info');
		} else {
			$scope.activeSelectedFlag = flag;
			var a = $(e.children[0].children[0]);
			if(a.hasClass('selectedMailAvatar')){
				a.removeClass('selectedMailAvatar');
				selected_mails.splice(selected_mails.indexOf(index), 1);
			} else {
				a.addClass('selectedMailAvatar');
				selected_mails.push(index);
			}

			$(e.parentNode).toggleClass('bg-grey bg-lighten-2');

			if(selected_mails.length > 0)
				$scope.onSelectedMail = true;
			else
				$scope.onSelectedMail = false;
		}
	}

	$scope.getMailIndex = function(id, flag){
		var x = flag == 'inbox' ? $scope.inbox_data : $scope.sent_data;
		for(let i=0; i<x.length; i++){
			if(id == x[i].id)
				return i;
		}
	};

	$scope.delete = function(){
		_confirm(1, function(){
			var data = [];

			_leftAlert('Harap tunggu !', 'Sedang menghapus pesan ...', 'info');
			tmp_delete = JSON.parse( JSON.stringify(selected_mails) );
			$scope.resetSelected();

			for(let i=0; i < tmp_delete.length; i++){
				data.push({
					mail_id : $scope.inboxTabActivate ? $scope.inbox_data[ tmp_delete[i] ].id : $scope.sent_data[ tmp_delete[i] ].id, 
					file : $scope.inboxTabActivate ? $scope.inbox_data[ tmp_delete[i] ].file : $scope.sent_data[ tmp_delete[i] ].file
				});
			}

			$http.post('/api/mail/delete', {'data' : data})
			.then(function successCallback(response) {
				for(let i=0; i < data.length; i++){
					if($scope.inboxTabActivate){
						$scope.inbox_data.splice( $scope.getMailIndex(data[0].mail_id, 'inbox') , 1);
					} else {
						$scope.sent_data.splice( $scope.getMailIndex(data[0].mail_id, 'sent') , 1);
					}
				}
				_leftAlert('Berhasil !', 'Pesan berhasil dihapus.', 'success');
			}, function errorCallback(response) {
				alert('Internal Server Error');
				console.log(response.data);
			});			
		}, " Pesan terpilih akan terhapus secara permanen");
	}

	$scope.search = function(e, type){

		if(type == 'inbox' && tmp_inbox == 0)
			return;
		else if(type == 'sent' && tmp_sent == 0)
			return;

		if($scope.tmp_search == e.value)
			return;
		$scope.tmp_search = e.value;

		$timeout.cancel( $scope.timer );

		$scope.timer = $timeout(function(){

			if(e.value == ""){
				$scope.resetSearch(type);
				return;
			}

			$('.email-app-list').hide();
			$("#search-"+ type +"-loader").show();
			$http.post('/api/mail/search', {'keyword' : e.value, 'type' : type})
			.then(function successCallback(response) {
				if(type == 'inbox')
					$scope.inbox_data = response.data;
				else
					$scope.sent_data = response.data;

				$('.email-app-list').show();
				$("#search-"+ type +"-loader").hide();	
				on_search = true;			
				
			}, function errorCallback(response) {
				alert('Internal Server Error');
				console.log(response.data);
			});	

		}, 500);		
	}

    $('#inbox-fly').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight && next_inbox) {
            $rootScope.loadInbox();
        }
    })

    $('#sent-fly').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight && next_sent) {
            $rootScope.loadOutbox();
        }
    })

});