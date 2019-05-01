var sawlRet = false;
var swalBase = [
		{ // 0
			title:'Apakah anda yakin ?', 
			text : 'Catatan pesanan anda akan dihapuskan',
			icon : 'warning'
		}	
];

function getSwalBody(type){
	return {
		title : swalBase[type].title,
		text : swalBase[type].text,
		icon : swalBase[type].icon,
		buttons : true,
		dangerMode : true
	}
}

function _confirm(type, event){
	if(!sawlRet){
		swal(getSwalBody(type))
		.then((willDelete) => {
			if(willDelete){
				event();
			}
		});
	}
}