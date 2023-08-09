<div class="container">
    <div class="col-md-12 pt-4 ps-4">
        <h2 class="text-muted">Expenses Report</h2>
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
    @if (Session::has('error'))
        <div class="col-md-12" id="alert_col">
            <div class="alert bg-danger text-light d-flex justify-content-between">
                <span>{{ Session::get('error') }}</span>
                <button type="button" class="bg-transparent border-0 text-light"
                    onclick="document.getElementById('alert_col').classList.add('d-none')"><i
                        class="bi bi-x-square fs-4"></i></button>
            </div>
        </div>
    @endif
    <div class="col-md-12 px-4 pt-3">
        <div class="card">
            <h4
                class="card-header bg-danger text-light border border-2 border-danger rounded-bottom-0 d-flex justify-content-between">
                <span>
                    <i class="bi bi-clock-history pe-1"></i>
                    <span>History Of Expense</span>
                </span>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Added Expense</button>
            </h4>
            <div class="table-responsive card-body p-4 border border-2 border-danger">
                <div class="py-2">
                    <form action="{{ route('admin.expense') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-10 col-md-9">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-2 col-md-12">
                                        <select name="category">
                                            <option value="">(Category Filter)</option>
                                            @foreach ($categories as $exponse_category)
                                                <option value="{{ $exponse_category->category }}">
                                                    {{ $exponse_category->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-lg-5 col-md-12 text-lg-end text-start">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date">
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-12">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date">
                                        <button class="btn btn-sm btn-info" style="padding:1px 5px;">Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 text-end">
                                <a href="{{ route('admin.expense') }}" class="btn btn-sm btn-danger">Reset Table</a>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Category</td>
                            <td>
                                <form action="{{ route('admin.expense') }}" method="GET">
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
                                <form action="{{ route('admin.expense') }}" method="GET">
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
                        @if ($expenses->count() > 0)
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $expense->category }}</td>
                                    <td>{{ date('d F, Y', strtotime($expense->date)) }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    @php
                                        $string = 'Lorem ipsum dolor sit amet consectetur adipiscing elit parturient duis cum, porttitor massa litora augue aliquam praesent quam libero tempus, scelerisque purus est class ad imperdiet vel ullamcorper urna. Cursus vivamus enim sodales habitant maecenas velit arcu, primis quisque pharetra platea ligula neque accumsan lectus, ante ut in rhoncus natoque fames. Auctor orci nibh mattis placerat porta integer molestie, aptent dui luctus tortor dictum magnis, condimentum aliquet eget vitae himenaeos netus. Vestibulum erat viverra semper ridiculus nec turpis sed, montes aenean diam ultricies eros congue, interdum habitasse ornare blandit vulputate pellentesque. Fusce laoreet mauris dictumst consequat nostra, mi curabitur fermentum.';
                                    @endphp
                                    <td>{{ \Illuminate\Support\Str::limit($expense->description, 50, $end = '...') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.expense.edit', $expense) }}"
                                            class="btn btn-sm btn-success py-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.expense.destroy', $expense) }}" method="POST">
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
                                <td colspan="6" class="text-center text-muted">Expanse Recourd Not Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="expense_pagination d-flex justify-content-center">
                    {{ $expenses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
