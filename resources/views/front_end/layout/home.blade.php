@extends('layouts.master')
@section('home', 'active')
@section('page_title', 'Home')

@section('customHead')
<link href="../../../filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../../css/additional/page-info/news.css">
<link rel="stylesheet" type="text/css" href="../../../css/additional/page-info/page.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/loaders/loaders.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-loader.css"> 
@endsection

@section('content')
@unlessrole('member')
<h3 class="content-header-title mb-2">Buat Info</h3>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <form class="form"  method="POST" action="/info/store">
          @csrf
          <div class="form-group">
            <label>Judul / Subjek</label>
            <input type="text" autocomplete="off" name="subject" class="form-control" placeholder="Judul atau subjek info">
          </div>
          <div class="form-group">
            <label>Isi Info</label>
            <textarea name="text" autocomplete="off" class="form-control" placeholder="Isi info (text)"></textarea>
          </div>
          <div class="form-group">
            <label>Sisipkan Gambar</label>
            <input type="file" name="attachment" multiple max="10">
          </div>
          <input type="hidden" name="imgs">
          <div class="form-group">
            <button class="btn btn-primary pull-right" type="button" id="post_button"><i class="fa fa-share-square-o"></i>  Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<hr>
@endunlessrole
<h3 class="content-header-title mb-2">Beranda Info</h3>
<div class="row">
    @unlessrole('member')
      <form method="POST" action="/info/delete" id="delete_form">
        @csrf
      </form>
    @endunlessrole
    @php $color = ['primary', 'danger', 'success', 'info'];@endphp
    @foreach($data as $item)
    @php $r = rand(0,3); @endphp
    <div class="col-12">
        <div class="card border-{{ $color[$r] }}">
            <div class="card-header">
              <h4 class="card-title">{{ $item->subject }}</h4>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              @unlessrole('member')
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li><button data-id="{{ $item->id }}" class="btn btn-sm btn-danger delete"><i class="fa fa-trash mr-1"></i>Hapus</button></li>
                </ul>
              </div>  
              @endunlessrole
            </div>
            <div class="card-content">
              <div class="card-body" style="padding-top: unset !important;">
                @if(count($item->attachment) > 0)
                <div class="card-img mb-1 img-slide">
                    <div class="slideshow-container">
                        <a class="prev">&#10094;</a>
                        <a class="next">&#10095;</a>
                        @php $i = 1; @endphp
                        @foreach($item->attachment as $img)
                        <div class="mySlides">
                          <div class="numbertext">{{ $i++ }} / {{ count($item->attachment) }}</div>
                          <img height="300" class="img-rounded" src="infoAttachment/{{$img}}" style="width:100%">
                        </div>
                        @endforeach
                    </div>
                    <div style="text-align:center" class="mt-1">
                    </div>                        
                </div>
                @endif
                <div class="card-text  border-top border-top-{{ $color[$r] }} border-top-lighten-2" style="padding-top: 10px;">
                  <p class="card-text">
                    @php
                      $t = str_replace("\r\n","<br>",$item->text);
                      $txt = explode('<br>', $t); 
                    @endphp
                    @foreach($txt as $text)
                      {{ $text }} <br>
                    @endforeach
                  </p>
                </div>
              </div>
            </div>
        </div>            
    </div>        
    @endforeach
</div>
    @if(count($data) == 0)
      <p class="text-mutted">-- Belum ada info --</p>
    @endif
@endsection

@section('customJS')
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="../../../filepond/dist/filepond.min.js"></script>

<script src="../../../app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
<script src="../../../js/plugin/confirmDialog.js" type="text/javascript"></script>
<script src="../../../js/plugin/leftToastr.js" type="text/javascript"></script>

<script src="../../../js/view/info/news.js"></script>
<script src="../../../js/view/info/page.js"></script>
@endsection