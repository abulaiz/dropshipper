// Image Slider ----------------------------------------------
let z = document.getElementsByClassName('img-slide');
var element = [];
for(let i=0; i<z.length; i++){
	element.push(new news(z[i]));
	element[i].init();
}


// FilePond Initiation ---------------------------------------
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginFileValidateType
);
FilePond.setOptions({
    server: {
        url: '/fileUpload',
        process: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }                   
        },
    }
});
const inputElement = document.querySelector('input[type="file"]');
var pond = FilePond.create( inputElement, {acceptedFileTypes: ['image/png']} );
            pond.labelTapToUndo = '';
pond.allowRevert = false;

$("#post_button").click(function(){
    var attachment = [];
    var x = pond.getFiles();

    for(let i=0; i < x.length; i++){
        if(x[i].status != 5){
            _leftAlert('Oops !', 'Beberapa gambar belum berhasil diupload, batalkan atau muat ulang', 'warning');
            return;
        }
        attachment.push(x[i].serverId);         
    } 
    $("[name=imgs]").val(JSON.stringify(attachment));
    this.parentNode.parentNode.submit();
});

$(".delete").click(function(){
    var e = this;
    _confirm(0, function(){
        $("#delete_form").append("<input name='id' type='hidden' value='"+ $(e).data('id') +"'>");
        document.getElementById('delete_form').submit();
    }, "Info akan dihapus permanen.");
});