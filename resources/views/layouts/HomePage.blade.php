<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounting System Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    @include('layouts.nav-link')
    @yield('navigation')



    <!-- Main Content -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <i class="fas fa-tachometer-alt me-2"></i> Overview
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-money-bill-wave me-2"></i> Transactions
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fas fa-users me-2"></i> Customers
                    </a>
                    <a href="{{ route('vendors') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-building me-2"></i> Products
                    </a>
                    <a href="{{ route('SettingsPage') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-cog me-2"></i> Settings
                    </a>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="col-md-9 col-lg-10">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Revenue</h5>
                                <h2 class="card-text">$521230,000</h2>
                                <p class="card-text"><small>Last 32340 days</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Total Expenses</h5>
                                <h2 class="card-text">$31231230,000</h2>
                                <p class="card-text"><small>Last 30123 days</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-info">
                            <div class="card-body">
                                <h5 class="card-title">Net Profit</h5>
                                <h2 class="card-text">$20123121,000</h2>
                                <p class="card-text"><small>Last 30123 days</small></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Recent Transactions</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2024-03-15</td>
                                    <td>Christian Supplies</td>
                                    <td>Expense</td>
                                    <td class="text-danger">-$250.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>2024-03-14</td>
                                    <td>Alicaba Payment</td>
                                    <td>Income</td>
                                    <td class="text-success">+$1,500.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
