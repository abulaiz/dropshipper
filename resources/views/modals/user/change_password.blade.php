        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('changePassword') }}">
                    @csrf
                    <div class="modal-header bg-info">
                        <h4 class="modal-title" style="color:white">Ganti Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="bank_code">Password Lama</label>
                            <input type="password" name="oldPas" class="form-control" placeholder="Your Old Password"></input>
                        </div>
                        <div class="form-group">
                            <label for="name">Password Baru</label>
                            <input type="password" placeholder="New Password" name="newPas" class="form-control"></input>
                        </div>    
                        <div class="form-group">
                            <label for="name">Konfirmasi Password Baru</label>
                            <input type="password" placeholder="Please re enter new Password" name="cfrPas" class="form-control"></input>
                        </div>                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="submit" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div>