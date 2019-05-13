app.config(function($routeProvider) {

	$routeProvider
	.when("/", {
		templateUrl : "email/mailbox"
	})
	.when("/content", {
		templateUrl : "email/detail"
	});
});