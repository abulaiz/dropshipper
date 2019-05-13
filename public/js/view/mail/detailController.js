var tmp_res = [];

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
				$scope.onload = false;				
			}
		}
	} else {
		$http.post('/api/mail/read', {id : $scope.state.id, file : $scope.state.file})
		.then(function successCallback(response) {
			$scope.content = response.data.text.split('\n').join('<br>');
			$('#contentMail').html($scope.content);
			$scope.onload = false;
			
			if($scope.state.file == 'inbox')
				tmp_res.push({'id' : $scope.state.id, 'text' : $scope.content});	
			
		});	
	}

	$scope.avatarColour = function(){
		if($scope.flag == 'A')
			return 'bg-primary';
		else if($scope.flag == 'S')
			return 'bg-danger';
		else 
			return 'bg-' + avatar_colour[ Math.floor(($scope.name[0].toUpperCase().charCodeAt(0)-1)/2) - 32 ];
	};

	$scope.getDate = function(){
		var x = $scope.created_at.split(' ');
		if(x[0] == today)
			return 'Hari ini, ' + x[1];
		else 
			return x[0].substr(8, 2) +' '+ month[Number(x[0].substr(5, 2)) - 1]+ ' '+ x[0].substr(0, 4);
	};
	
});