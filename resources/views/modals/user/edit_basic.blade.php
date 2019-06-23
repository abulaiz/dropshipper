        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('changeInfo') }}">
                    @csrf
                    <div class="modal-header bg-info">
                        <h4 class="modal-title" style="color:white">Update Basic Info</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="bank_code">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}"></input>
                        </div>    
                        <div class="form-group">
                            <label for="bank_code">Gender</label><br>
                            <div class="skin skin-flat d-inline-block">
                                 <fieldset style="float: left;">
                                  <input type="radio" name="gender" @if($user->gender=="1") checked @endif value="1">
                                  <label>Laki - laki</label>
                                </fieldset>
                                <fieldset style="padding-left: 10px;">
                                  <input type="radio" name="gender" @if($user->gender=="0") checked @endif value="0">
                                  <label>Perempuan</label>
                                </fieldset>                             
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="bank_code">No Telepon</label>
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number" value="{{$user->phone}}"></input>
                        </div>    
                        <div class="form-group">
                            <label for="bank_code">Alamat</label>
                            <input type="text" name="address" class="form-control" placeholder="Your Short Address" value="{{$user->address}}"></input>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="submit" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div>