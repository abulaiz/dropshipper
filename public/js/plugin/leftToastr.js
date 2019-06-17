var option = null;

function _leftAlert(title, text, type, removeBefore = true){
	if(removeBefore)
		toastr.remove();

	option = {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'};
	if(type == 'error'){
		toastr.error(text, title, option);
	} else if(type == 'success') {
		toastr.success(text, title, option);
	} else if(type == 'info') {
		toastr.info(text, title, option);
	} else if(type == 'warning'){
		toastr.warning(text, title, option);
	}
}