<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body cus-font">
        <form action="<?=base_url()?>piutang/bayar" method="POST">
          <input type="hidden" name="tipe" id="tipe">
          <input type="hidden" name="id" id="id">
          <div class="table-responsive">
            <table class="table table-sm cus-font">
              <thead id="head"></thead>
              <tbody id="list-invoice"></tbody>
            </table>
          </div>
          <div class="form-group">
            <label for="nominal">Uang Pembayaran</label>
            <input type="text" name="nominal" id="nominal" class="form-control form-control-sm" required>
          </div>
          <div class="form-group">
            <label for="tgl">Tgl Pembayaran</label>
            <input type="date" name="tgl" id="tgl" class="form-control form-control-sm" required>
          </div>
          <div class="form-group">
            <label for="metode">Metode Pembayaran</label>
            <select name="metode" id="metode" class="form-control form-control-sm" required>
              <option value="">Pilih Metode Pembayaran</option>
              <option value="Cash">Cash</option>
              <option value="Transfer">Transfer</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success btn-sm" value="Bayar" id="hapusInvoice">
        </div>
      </form>
    </div>
  </div>
</div>