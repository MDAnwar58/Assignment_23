<div class="container">
    <div class="col-md-12 pt-4 ps-4">
        <h2 class="text-muted">Incomes Report</h2>
        <hr>
    </div>
    @if (Session::has('success'))
        <div class="col-md-12" id="alert_col">
            <div class="alert bg-success text-light d-flex justify-content-between">
                <span>{{ Session::get('success') }}</span>
                <button type="button" class="bg-transparent border-0 text-light"
                    onclick="document.getElementById('alert_col').classList.add('d-none')"><i
                        class="bi bi-x-square fs-4"></i></button>
            </div>
        </div>
    @endif
    <div class="col-md-12 px-4 pt-3">
        <div class="card">
            <h4
                class="card-header bg-info text-light border border-2 border-info rounded-bottom-0 d-flex justify-content-between">
                <span>
                    <i class="bi bi-clock-history pe-1"></i>
                    <span>History Of Income</span>
                </span>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#income_modal">Added Income</button>
            </h4>
            <div class="table-responsive card-body p-4 border border-2 border-info">
                <div class="d-flex justify-content-between py-2">
                    <form action="{{ route('admin.income') }}" method="GET">
                        <div class="form-group">
                            <select name="category">
                                <option value="">(Category Filter)</option>
                                @foreach ($categories as $exponse_category)
                                    <option value="{{ $exponse_category->category }}">{{ $exponse_category->category }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="start_date" class="ps-4">Start Date</label>
                            <input type="date" name="start_date">
                            <label for="end_date" class="ps-4">End Date</label>
                            <input type="date" name="end_date">
                            <button class="btn btn-sm btn-info" style="padding:1px 5px;">Filter</button>
                        </div>
                    </form>
                    <a href="{{ route('admin.income') }}" class="btn btn-sm btn-danger">Reset Table</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Category</td>
                            <td>
                                <form action="{{ route('admin.income') }}" method="GET">
                                    @if ($dataDate == 'asc')
                                        <input type="hidden" name="date_asc" value="asc">
                                        <button type="submit" class="btn btn-sm border-0">
                                            Date
                                            <i class="bi bi-caret-down-fill"></i>
                                        </button>
                                    @elseif ($dataDate == 'desc')
                                        <input type="hidden" name="date_desc" value="desc">
                                        <button type="submit" class="btn btn-sm border-0">
                                            Date
                                            <i class="bi bi-caret-up-fill"></i>
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.income') }}" method="GET">
                                    @if ($dataAmount == 'asc')
                                        <input type="hidden" name="amount_asc" value="asc">
                                        <button type="submit" class="btn btn-sm border-0">
                                            Amount
                                            <i class="bi bi-caret-down-fill"></i>
                                        </button>
                                    @else
                                        <input type="hidden" name="amount_desc" value="desc">
                                        <button type="submit" class="btn btn-sm border-0">
                                            Amount
                                            <i class="bi bi-caret-up-fill"></i>
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($incomes->count() > 0)
                            @foreach ($incomes as $income)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $income->category }}</td>
                                    <td>{{ date('d F, Y', strtotime($income->date)) }}</td>
                                    <td>{{ $income->amount }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($income->description, 50, $end = '...') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.income.edit', $income) }}"
                                            class="btn btn-sm btn-success py-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.income.destroy', $income) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger py-2">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center text-muted">Income Recourd Not Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="income_pagination">
                    @if ($incomes->count() > 0)
                        <div class="d-flex justify-content-center">
                            {{ $incomes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
