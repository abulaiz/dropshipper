var tmp_res = [];

function initPhotoSw(){
    initPhotoSwipeFromDOM('.my-gallery');
    if($('.masonry-grid').length > 0){
        $('.masonry-grid').masonry({
              // options
              itemSelector: '.grid-item',
              columnWidth: '.grid-sizer',
              //cpercentPosition: true
        });
    }	
}

app.controller('detail' ,function ($scope, $rootScope, $location, $http) {
	$scope.onload = true;

	// Get Mail State From Parent C
	$scope.state = $rootScope.getMailState();

	// Throw if not acces from mailbox
	if($scope.state == null)
		$location.path('/');

	$scope.flag = $scope.state.flag;
	$scope.name = $scope.state.name;
	$scope.created_at = $scope.state.created_at;
	$scope.subject = $scope.state.subject;
	$scope.name = $scope.state.name;
	$scope.email = $scope.state.email;
	$scope.attachment = [];

	if($scope.state.file != 'inbox' && $scope.state.file[ $scope.state.file.length - 1 ] != 'i')
		$("#reply-icon").hide();

	$scope.hasCached = function(id){
		for (let i = 0; i < tmp_res.length; i++) {
			if(tmp_res[i].id == id)
				return true;
		}
		return false;
	};

	if($scope.state.file == 'inbox' && $scope.hasCached($scope.state.id)){
		for (let i = 0; i < tmp_res.length; i++) {
			if(tmp_res[i].id == $scope.state.id){
				$scope.content = tmp_res[i].text;
				$('#contentMail').html($scope.content);
				$scope.attachment = tmp_res[i].attachment;
				$scope.onload = false;		
				initPhotoSw();		
			}
		}
	} else {
		$http.post('/api/mail/read', {id : $scope.state.id, file : $scope.state.file})
		.then(function successCallback(response) {
			$scope.content = response.data.text.split('\n').join('<br>');
			$('#contentMail').html($scope.content);
			$scope.attachment = response.data.attachment;
			initPhotoSw();
			
			$scope.onload = false;
			if($scope.state.file == 'inbox')
				tmp_res.push({'id' : $scope.state.id, 'text' : $scope.content, 'attachment' : response.data.attachment});	
			
		});	
	}

	$scope.avatarColour = function(){
		if($scope.flag == 'A')
			return 'bg-primary';
		else if($scope.flag == 'S')
			return 'bg-danger';
		else 
			return 'bg-' + avatar_colour[ Math.floor(($scope.email[0].toUpperCase().charCodeAt(0)-1)/2) - 32 ];
	};

	$scope.getDate = function(){
		var x = $scope.created_at.split(' ');
		if(x[0] == today)
			return 'Hari ini, ' + x[1];
		else 
			return x[0].substr(8, 2) +' '+ month[Number(x[0].substr(5, 2)) - 1]+ ' '+ x[0].substr(0, 4);
	};

	$scope.back = function(){
		$location.path('/');
	}

	$scope.reply = function(){
		if($scope.flag == 'M')
			$rootScope.setComposeMail("Re:"+$scope.subject, $scope.email);
		else
			$rootScope.setComposeMail("Re:"+$scope.subject);
	}
	
});