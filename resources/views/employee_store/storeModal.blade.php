    <!-- Store Create Modal -->
    <div class="modal fade" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="storeModalLabel">店舗情報を登録する</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('stores.store') }}" method="POST">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label for="name">店舗名</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="min_employees">最低従業員数</label>
                <input type="number" class="form-control" id="min_employees" name="min_employees" required>
            </div>
            <div class="form-group">
                <label for="closed_day">休日</label>
                <input type="number" class="form-control" id="closed_day" name="closed_day" required>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>
        </div>
    </div>
    </div>






