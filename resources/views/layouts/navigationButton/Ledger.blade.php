<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ledger</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    @include('layouts.nav-link')
    @yield('navigation')

    <div class="container mt-4">
        <!-- Header -->
        <h2>General Ledger</h2>

        <!-- Simple Search -->
        <div class="row mb-4">
            <div class="col">
                <input type="text" class="form-control" placeholder="Search transactions...">
            </div>
        </div>

        <!-- Basic Ledger Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Account</th>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2024-03-15</td>
                    <td>Cash</td>
                    <td>Client Payment - ABC Corp</td>
                    <td>$5,000.00</td>
                    <td>-</td>
                    <td>$5,000.00</td>
                </tr>
                <tr>
                    <td>2024-03-15</td>
                    <td>Accounts Receivable</td>
                    <td>Client Payment - ABC Corp</td>
                    <td>-</td>
                    <td>$5,000.00</td>
                    <td>$0.00</td>
                </tr>
            </tbody>
        </table>

        <!-- Simple Pagination -->
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</body>

</html>
