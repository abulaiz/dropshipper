@extends('layouts.master')
@section('home', 'active')

@section('content')

<div class="row">
    <div class="col-3">
        <select class="form-control" id="method">
            <option id="empty" value="">Pilih Method</option>
            <option value="get">GET</option>
            <option value="post">POST</option>
        </select>
    </div>
    <div class="col-6">
        <input type="text" id="url" placeholder="URL" class="form-control">
    </div>
    <div class="col-3">
        <button class="btn btn-success" id="send">
            Send
        </button>
    </div>
</div>  

<section id="tab-pane1" style="margin-top: 10px; display: none;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body row">
                        <div class="col-md-12" id="params">
                            <div class="row rowtester">
                                <input type="text" class="col-5 tester" placeholder="Parameter">
                                <input type="text" class="col-5 tester" placeholder="Value">               
                                <a class="btn btn-danger" onclick="remove(this)">
                                    <i class="fa fa-times text-white"></i>
                                </a>      
                            </div>                                                          
                        </div>
                        <a class="btn btn-info col-12 text-white" onclick="add()">Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div style="display: none;" id="aslinya">
    <div class="row rowtester">
        <input type="text" class="col-5 tester" placeholder="Parameter">
        <input type="text" class="col-5 tester" placeholder="Value">               
        <a class="btn btn-danger" onclick="remove(this)">
            <i class="fa fa-times text-white"></i>
        </a>      
    </div>     
</div>

<div style="display: none;">
    <form id="hiddenForm" method="POST">
        
    </form>
</div>

@endsection

@section('customJS')

    <script type="text/javascript">
        function add(){
            $('#params').append( $('#aslinya').html() );
        }

        function remove(x){
            $(x.parentNode).remove();
        }

        function setInput(name, value){
            return '<input type="text" name="'+name+'" value="'+value+'">';
        }

        $('#send').click(function(){
            var c = document.getElementById('hiddenForm');
            for(let i=0; i < c.children.length; i++){
                $(c.children[i]).remove();
            }

            if( $('#method').val() == 'get' ){
                window.location = $('#url').val();
            } else {
                var cls = $('.rowtester');
                for (let i = 0; i < cls.length; i++) {
                    if(cls[i].children[0].value != '')
                        $('#hiddenForm').append( setInput(cls[i].children[0].value, cls[i].children[1].value) );
                }
                $('#hiddenForm').attr({'action' : $('#url').val() });
                document.getElementById('hiddenForm').submit();
            }
        });

        $('#method').change(function(){
            $('#empty').attr({'disabled' : 'disabled'});
            if(this.value == 'get')
                $('#tab-pane1').hide();
            else
                $('#tab-pane1').show();
        });
    </script>

@endsection
