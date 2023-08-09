<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <h4 class="card-header bg-danger text-center text-light">
                    Income Edit
                </h4>
                <form action="{{ route('admin.income.update', $income) }}" method="POST" class="card-body border border-danger">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="category"
                            class="form-control px-4 py-2 @error('category') is-invalid @enderror"
                            placeholder="Your Category" value="{{ $income->category }}">
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <div class="input-group-text @error('amount') border-danger border-end-0 @enderror">$
                                </div>
                                <input type="number" name="amount"
                                    class="form-control px-4 py-2 @error('amount') is-invalid border-start-0 @enderror"
                                    placeholder="Amount" value="{{ $income->amount }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="date" name="date"
                                    class="form-control px-4 py-2 @error('date') is-invalid @enderror"
                                    placeholder="Your Category" value="{{ $income->date }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5"
                            placeholder="Description">{{ $income->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-sm btn-warning w-100 mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>