	var tmp_val = '';
	var panelToggle = true;

	function showPanel(e){
		if(panelToggle)
			$('#startDate').focus();
		else
			$(e).focus();
		panelToggle = !panelToggle;
	}

    app.controller('historyOrder', function($scope, $http, $timeout){

    	$scope.all_data = [];
    	$scope.periode_data = [];

        $('.date-picker').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));  

                if(tmp_val != inst.selectedYear+'-'+inst.selectedMonth){
                	$('.table-responsive').hide();
                	$('.loader-wrapper').show();     

			        $http.post('/api/user/order/history', {'month' : (inst.selectedMonth+1).toString().padStart(2, '0'), 'year' : inst.selectedYear})
			        .then(function successCallback(response) {

			        	$scope.periode_data = response.data;
			        	tmp_val = inst.selectedYear+'-'+inst.selectedMonth;

				    	$scope.all_data = response.data.res1;
				    	$scope.periode_data = response.data.res2;	

	                	$('.table-responsive').show();
	                	$('.loader-wrapper').hide();                   	  

			        }, function errorCallback(response) {
						toastr.error('Terjadi kesalaha, coba lagi.', 'Request Failed!', {
						positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
			        });	
                }


            },
        });

    });