        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" style="color:white">Tambah Stok - {* product_name *}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bank_code">Jumlah Penambahan</label>
                        <input type="number" min="1" id="qty" class="form-control" />
                    </div>                                
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" ng-click="add()">Tambahkan</button>
                </div>
            </div>
        </div>