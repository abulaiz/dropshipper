var sawlRet = false;
var swalBase = [
		{ // 0
			title:'Apakah anda yakin ?', 
			text : 'Catatan pesanan anda akan dihapuskan',
			icon : 'warning'
		},
		{ // 1
			title:'Apakah anda yakin ?', 
			text : 'Setelah dikonfirmasi, stok produk member akan langsung ditambahkan',
			icon : 'info'
		},	
		{ // 2
			title:'Apakah anda yakin ?', 
			text : 'Pesanan Produk member akan dibatalkan',
			icon : 'warning'
		},	
		{ // 3
			title:'Apakah anda yakin ?', 
			text : 'Request Pengiriman anda akan dibatalkan ?',
			icon : 'warning'
		},	
		{ // 4
			title:'Apakah data sudah benar ?', 
			text : ' ?',
			icon : 'warning'
		},									
];

function getSwalBody(type, text){
	return {
		title : swalBase[type].title,
		text : text != null ? text : swalBase[type].text,
		icon : swalBase[type].icon,
		buttons : true,
		dangerMode : true
	}
}

function _confirm(type, event, text = null){
	if(!sawlRet){
		swal(getSwalBody(type, text))
		.then((willDelete) => {
			if(willDelete){
				event();
			}
		});
	}
}