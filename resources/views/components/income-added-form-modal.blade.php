<div class="modal fade" id="income_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.income.store') }}" method="POST" class="modal-content border border-2 border-info">
            @csrf
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-4 text-light" id="exampleModalLabel">
                    <i class="bi bi-plus-square pe-2"></i>
                    <span>Added New Income</span>
                </h1>
                <button type="button" class="bg-transparent border-0 text-light" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-octagon"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="category" class="form-control px-4 py-2 @error('category') is-invalid @enderror" placeholder="Your Category">
                </div>
                <div class="row mt-2">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-text @error('amount') border-danger border-end-0 @enderror">$</div>
                            <input type="number" name="amount" class="form-control px-4 py-2 @error('amount') is-invalid border-start-0 @enderror" placeholder="Amount">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="date" name="date" class="form-control px-4 py-2 @error('date') is-invalid @enderror" placeholder="Your Category">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100">Save changes</button>
            </div>
        </form>
    </div>
</div>
