<!-- Navigation -->
@section('navigation')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" {{ request()->is('/') ? 'active text-white' : 'text-white-50' }}>
                <i class="fas fa-calculator me-2"></i>
                Accounting System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ request()->is('/') ? 'active text-white' : 'text-white-50' }}">
                            <i class="fas fa-home me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('LedgerPage') ? 'active text-white' : 'text-white-50' }}"
                            href="{{ route('LedgerPage') }}">
                            <i class="fas fa-book me-1"></i> Ledger
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('InvoicesPage') ? 'active text-white' : 'text-white-50' }}"
                            href="{{ route('InvoicesPage') }}">
                            <i class="fas fa-file-invoice-dollar me-1"></i> Invoices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ReportsPage') ? 'active text-white' : 'text-white-50' }}"
                            href="{{ route('ReportsPage') }}">
                            <i class="fas fa-chart-line me-1"></i> Reports
                        </a>
                    </li>
                </ul>
                <form action="{{ route('admin.logout') }}" method="post" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-light">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
@endsection
