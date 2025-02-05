<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4C6FFF;
            --secondary-color: #6c757d;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .vendor-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #3955CC 100%);
            color: white;
            padding: 2.5rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .stats-card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
        }

        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            color: var(--secondary-color);
            font-weight: 600;
        }

        .search-box {
            position: relative;
            max-width: 300px;
        }

        .search-box input {
            padding-left: 40px;
            border-radius: 20px;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-color);
        }

        .status-badge {
            padding: 0.5em 1em;
            border-radius: 20px;
            font-size: 0.85em;
        }

        .btn-action {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }

        .modal-content {
            border-radius: 12px;
            border: none;
        }

        .modal-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 12px 12px 0 0;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(76, 111, 255, 0.25);
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
        }

        .drop-zone {
            border: 2px dashed #dee2e6;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .drop-zone:hover {
            border-color: var(--primary-color);
            background-color: #f8f9fa;
        }

        .form-control-lg {
            padding: 1rem 1.25rem;
            border-radius: 0.5rem;
        }

        .input-group .input-group-text {
            padding: 1rem 1.25rem;
            border-radius: 0.5rem 0 0 0.5rem;
        }

        .input-group .form-control {
            border-radius: 0 0.5rem 0.5rem 0;
        }

        nav .btn {
            color: var(--secondary-color);
        }

        nav .btn.active {
            border: none;
            background-color: #fff;
            color: #000;
            font-weight: 600;
            border: 1px solid #dee2e6;

        }

        nav .dropdown-item.active {
            border: 1px solid #dee2e6;
            background-color: #fff;
            color: #000;
        }

        .dropdown-menu {
            background-color: #fff;
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            color: #000;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #000;
        }
    </style>
</head>

<body>
    @include('layouts.nav-link')
    @yield('navigation')

    <!-- Header Section -->
    <div class="vendor-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-2"><i class="fas fa-store"></i> Products Management</h1>
                    <p class="mb-0">Manage your products efficiently</p>
                </div>
                <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addVendorModal">
                    <i class="fas fa-plus"></i> Add New Product
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-4">

            <div class="col-md-3">
                <div class="stats-card card">
                    <div class="card-body">
                        <h6 class="text-muted mb-2">Total Products</h6>
                        <h3 class="mb-0">{{ count($products) }}</h3>
                        <div class="mt-2 text-danger">
                            <i class="fas fa-arrow-down"></i> 5.2%
                            <small class="text-muted">vs last month</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card card">
                    <div class="card-body">
                        <h6 class="text-muted mb-2">Low Stock Items</h6>
                        <h3 class="mb-0">{{ $products->where('stock', '<', 20)->count() }}</h3>
                        <div class="mt-2 text-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            <small class="text-muted">Needs attention</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card card">
                    <div class="card-body">
                        <h6 class="text-muted mb-2">Total Value</h6>
                        <h3 class="mb-0">₱{{ number_format($products->sum('price'), 2) }}</h3>
                        <div class="mt-2 text-success">
                            <i class="fas fa-chart-line"></i>
                            <small class="text-muted">Inventory value</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search products...">
                </div>

                @if ($products->isEmpty())
                    <!-- <div class="alert alert-warning">Don't have any products</div> -->
                @else
                    <nav>
                        <ul class="d-flex justify-content-center gap-4 list-unstyled">
                            <li>
                                <button class="btn active" onclick="filterProductsNavigation('all', event)">
                                    All
                                </button>
                            </li>
                            @php
                                $categories = $products->pluck('category')->unique();
                                $mainCategories = $categories->take(4);
                                $extraCategories = $categories->slice(4);
                            @endphp
                            @foreach ($mainCategories as $category)
                                <li>
                                    <button class="btn"
                                        onclick="filterProductsNavigation('{{ $category }}',event)">
                                        {{ $category }}
                                    </button>
                                </li>
                            @endforeach
                            @if ($extraCategories->count() > 0)
                                <li class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        More
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach ($extraCategories as $category)
                                            <li>
                                                <button class="dropdown-item"
                                                    onclick="filterProductsNavigation('{{ $category }}',event)">
                                                    {{ $category }}
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif

                <div class="btn-group gap-2">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                        data-bs-toggle="dropdown">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="filterProducts('all')">All</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterProducts('price')">Price</a></li>
                        <li><a class="dropdown-item" href="#" onclick="filterProducts('lowStock')">Low Stock</a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="filterProducts('inStock')">In Stock</a>
                        </li>
                    </ul>
                    <form action="{{ route('export.users.excel') }}" method="get">
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </form>

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle" id="productTable">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Added Date</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="product-row">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/' . $product->image) }}" class="rounded-circle me-3"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-0">{{ $product->productName }}</h6>
                                            <small class="text-muted">ID: #{{ $product->productId }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold">{{ $product->category }}</span>
                                </td>
                                <td>
                                    <span class="fw-bold">₱{{ number_format($product->price, 2) }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="progress flex-grow-1 me-2" style="height: 5px;">
                                            <div class="progress-bar bg-{{ $product->stock < 10 ? 'danger' : 'success' }}"
                                                role="progressbar"
                                                style="width: {{ min(($product->stock / 100) * 100, 100) }}%">
                                            </div>
                                        </div>
                                        <span>{{ $product->stock }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if ($product->stock < 20)
                                        <span class="status-badge bg-danger text-white">Low Stock</span>
                                    @else
                                        <span class="status-badge bg-success text-white">In Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($product->updated_at)->format('F j, Y') }}
                                    </small>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($product->updated_at)->diffForHumans() }}
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-action btn-outline-primary btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#editProductModal"
                                            onclick="editProduct({{ $product->id }}, '{{ $product->productName }}', '{{ $product->category }}', {{ $product->price }}, {{ $product->stock }}, '{{ $product->image }}')">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('product.delete', $product->productId) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-action btn-outline-danger btn-sm ms-1"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Vendor Modal -->
    <div class="modal fade" id="addVendorModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="adminId" value="{{ Auth::user()->adminId }}">
                    <input type="hidden" name="adminUser" value="{{ Auth::user()->branchName }}">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName"
                                placeholder="Enter product name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Enter category" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01"
                                placeholder="Enter price" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                placeholder="Enter stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <div class="drop-zone p-3 bg-light rounded text-center">
                                <input type="file" class="form-control d-none" id="image" name="image"
                                    accept="image/*" required onchange="previewImage(this)">
                                <img id="imagePreview" src="#" alt="Preview"
                                    style="display: none; max-width: 100px; max-height: 100px; object-fit: cover;"
                                    class="mb-3 mx-auto rounded">
                                <div class="drop-zone-content">
                                    <i class="fas fa-cloud-upload-alt fa-2x mb-2 text-primary"></i>
                                    <p class="mb-2">Click to upload image</p>
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="document.getElementById('image').click()">
                                        Browse Files
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="productId" name="productId">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="editProductName" name="productName"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="editCategory" name="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="editPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editPrice" name="price" step="0.01"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editStock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="editStock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Product Image</label>
                            <div class="drop-zone p-3 bg-light rounded text-center">
                                <input type="file" class="form-control d-none" id="editImage" name="image"
                                    accept="image/*" onchange="previewEditImage(this)">
                                <img id="editImagePreview" src="#" alt="Preview"
                                    style="display: none; max-width: 100px; max-height: 100px; object-fit: cover;"
                                    class="mb-3 mx-auto rounded">
                                <div class="drop-zone-content">
                                    <i class="fas fa-cloud-upload-alt fa-2x mb-2 text-primary"></i>
                                    <p class="mb-2">Click to upload new image</p>
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="document.getElementById('editImage').click()">
                                        Browse Files
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function filterProductsNavigation(category, event) {
            document.querySelectorAll('nav .btn').forEach(btn => {
                btn.classList.remove('active');
            });

            event.target.classList.add('active');

            let table = document.getElementById('productTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                let categoryCell = tr[i].getElementsByTagName('td')[1];
                if (categoryCell) {
                    let categoryValue = categoryCell.textContent || categoryCell.innerText;

                    if (category === 'all' || categoryValue.trim() === category) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }



        function editProduct($id, $productName, $category, $price, $stock, $image) {
            document.getElementById('productId').value = $id;
            document.getElementById('editProductName').value = $productName;
            document.getElementById('editCategory').value = $category;
            document.getElementById('editPrice').value = $price;
            document.getElementById('editStock').value = $stock;
            document.getElementById('editImage').value = $image;
        }

        function filterProducts(filterType) {
            const rows = document.getElementsByClassName('product-row');
            Array.from(rows).forEach(row => {
                const stock = parseInt(row.querySelector('td:nth-child(4) span').textContent);
                const price = parseFloat(row.querySelector('td:nth-child(3) span').textContent.replace('$', ''));

                switch (filterType) {
                    case 'lowStock':
                        row.style.display = stock < 20 ? '' : 'none';
                        break;
                    case 'inStock':
                        row.style.display = stock >= 20 ? '' : 'none';
                        break;
                    case 'price':
                        // Sort by price (you may want to implement specific price filtering logic)
                        row.style.display = '';
                        break;
                    default:
                        row.style.display = '';
                }
            });
        }

        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const dropZoneContent = input.parentElement.querySelector('.drop-zone-content');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    dropZoneContent.style.display = 'none';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                dropZoneContent.style.display = 'block';
            }
        }

        function previewEditImage(input) {
            const preview = document.getElementById('editImagePreview');
            const dropZoneContent = input.parentElement.querySelector('.drop-zone-content');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    dropZoneContent.style.display = 'none';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
                dropZoneContent.style.display = 'block';
            }
        }

        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.getElementsByClassName('product-row');

            Array.from(rows).forEach(row => {
                const productName = row.querySelector('h6').textContent.toLowerCase();
                const category = row.querySelector('.fw-bold').textContent.toLowerCase();
                const productId = row.querySelector('small').textContent.toLowerCase();

                if (productName.includes(searchValue) ||
                    category.includes(searchValue) ||
                    productId.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
