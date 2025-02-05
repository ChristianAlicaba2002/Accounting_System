<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    @include('layouts.nav-link')
    @yield('navigation')

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">
                    <i class="fas fa-chart-line me-2"></i>
                    Reports
                </h1>

                <!-- Report Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Sales Report</h5>
                                <p class="card-text">View detailed sales analytics</p>
                                <a href="#" class="btn btn-light btn-sm">Generate Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Expense Report</h5>
                                <p class="card-text">Track all expenses</p>
                                <a href="#" class="btn btn-light btn-sm">Generate Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Profit & Loss</h5>
                                <p class="card-text">Financial performance</p>
                                <a href="#" class="btn btn-light btn-sm">Generate Report</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">Tax Report</h5>
                                <p class="card-text">Tax calculations & summary</p>
                                <a href="#" class="btn btn-light btn-sm">Generate Report</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Report Generator -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Generate Custom Report</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Report Type</label>
                                    <select class="form-select">
                                        <option>Sales Report</option>
                                        <option>Expense Report</option>
                                        <option>Profit & Loss</option>
                                        <option>Tax Report</option>
                                        <option>Custom Report</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Date Range</label>
                                    <select class="form-select">
                                        <option>Today</option>
                                        <option>This Week</option>
                                        <option>This Month</option>
                                        <option>Last 3 Months</option>
                                        <option>Custom Range</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Format</label>
                                    <select class="form-select">
                                        <option>PDF</option>
                                        <option>Excel</option>
                                        <option>CSV</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-file-export me-1"></i> Generate Report
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
