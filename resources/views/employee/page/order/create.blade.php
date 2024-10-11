@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                        href="ecommerce-products.html">Trang</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="ecommerce-products.html">Hóa
                                        đơn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tạo hoá đơn mới</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <form action="{{ route('create_order.post') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Card -->
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Thông tin Khách hàng</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="reservationSelect" class="input-label">Chọn đơn đặt</label>
                                    <select id="reservationSelect" class="custom-select" name="reservation_id">
                                        <option value="">Chọn đơn đặt</option>
                                        @foreach ($reservation as $val)
                                            <option value="{{ $val->reservation_id }}"
                                                data-name="{{ $val->customer->name }}"
                                                data-email="{{ $val->customer->email }}"
                                                data-phone="{{ $val->customer->phone }}"
                                                data-order-date="{{ $val->reservation_date }}"
                                                data-time="{{ $val->time }}" data-table-id="{{ $val->table_id }}">
                                                {{ $val->reservation_id }} -
                                                {{ $val->table_reservation->name }} -
                                                {{ $val->customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach ($reservation as $val)
                                    <input type="hidden" name="reservation_id" value="{{ $val->reservation_id }}">
                                    <input type="hidden" name="table_type_id" value="{{ $val->table_type_id }}">
                                @endforeach
                                <!-- Form Group -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="productNameLabel" class="input-label">Họ tên</label>
                                            <input type="text" class="form-control" name="name" id="productNameLabel">
                                            @error('name')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="input-label">Số điện thoại</label>
                                            <input type="number" class="form-control" name="phone"
                                                placeholder="eg. 348121032">
                                            @error('phone')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="SKULabel"
                                                placeholder="eg. 348121032">
                                            @error('email')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 mb-lg-5">
                            <!-- Header -->
                            <div class="card-header">
                                <h4 class="card-header-title">Thông tin Hóa đơn</h4>
                            </div>
                            <!-- End Header -->

                            <!-- Body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Ngày ăn</label>
                                            <input type="date" class="form-control" name="order_date" id="SKULabel">
                                            @error('order_date')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="SKULabel" class="input-label">Giờ</label>
                                            <input type="number" class="form-control" name="time" id="SKULabel">
                                            @error('time')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="collectionsLabel" class="input-label">Bàn</label>
                                            <select class="js-select2-custom custom-select" size="1"
                                                id="collectionsLabel" name="table_id" for="SKULabel">
                                                <option value="">Chọn bàn</option>
                                                @foreach ($table as $key => $val)
                                                    <option value="{{ $val->table_id }}" id="SKULabel">
                                                        {{ $val->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('table_id')
                                                <div>
                                                    <p class="text-danger">{{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="js-add-field card mb-3 mb-lg-5"
                            data-hs-add-field-options='{
                            "template": "#addVariantsTemplate",
                            "container": "#addVariantsContainer",
                            "defaultCreated": 0,
                            "limit": 100
                            }'>
                            <!-- Header -->
                            <div class="card-header">
                                <div class="row justify-content-between align-items-center flex-grow-1">
                                    <div class="col-12 col-sm mb-3 mb-sm-0">
                                        <h4 class="card-header-title">Món đã gọi</h4>
                                    </div>
                                    <div class="col-auto">
                                        <div class="d-flex align-items-center">
                                            <button type="button" id="addItemBtn"
                                                class="js-create-field btn btn-sm btn-ghost-secondary"> <i
                                                    class="tio-add"></i> Thêm món</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <div class="table-responsive datatable-custom">
                                <table id="datatable"
                                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th></th>
                                            <th class="table-column-pl-0">Tên món</th>
                                            <th class="table-column-pl-0">Mô tả</th>
                                            <th class="table-column-pl-0">Giá</th>
                                            <th class="table-column-pl-0">Số lượng</th>
                                            <th class="table-column-pl-0"></th>
                                        </tr>
                                    </thead>

                                    <tbody id="addVariantsContainer">
                                        <tr>
                                            <th></th>
                                            <th class="table-column-pl-0">
                                                <select class="form-control item-name-select" name="menu_id[]">
                                                    <option value="" data-description="" data-price="">Chọn món
                                                    </option>
                                                    @foreach ($menu as $key => $val)
                                                        <option value="{{ $val->item_id }}"
                                                            data-description="{{ $val->description }}"
                                                            data-price="{{ $val->price }}">{{ $val->item_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <input type="text" class="form-control description-input"
                                                    name="description[]" readonly>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">VNĐ</div>
                                                    </div>
                                                    <input type="text" class="form-control pl-8 price-input"
                                                        name="price[]" readonly>
                                                </div>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="js-quantity-counter input-group-quantity-counter">
                                                    <input type="number"
                                                        class="js-result form-control input-group-quantity-counter-control quantity-input"
                                                        name="quantity[]">
                                                </div>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="btn-group" role="group" aria-label="Edit group">
                                                    <a class="btn btn-white delete-row-btn" href="#">
                                                        <i class="tio-delete-outlined"></i>
                                                    </a>
                                                </div>
                                            </th>
                                        </tr>

                                        <tr id="addVariantsTemplate" style="display: none;" data-cloneable="true">
                                            <th></th>
                                            <th class="table-column-pl-0">
                                                <select class="form-control item-name-select" name="menu_id[]">
                                                    <option value="" data-description="" data-price="">Chọn món
                                                    </option>
                                                    @foreach ($menu as $key => $val)
                                                        <option value="{{ $val->item_id }}"
                                                            data-description="{{ $val->description }}"
                                                            data-price="{{ $val->price }}">{{ $val->item_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <input type="text" class="form-control description-input"
                                                    name="description[]" readonly>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">VNĐ</div>
                                                    </div>
                                                    <input type="text" class="form-control pl-8 price-input"
                                                        name="price[]" readonly>
                                                </div>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="js-quantity-counter input-group-quantity-counter">
                                                    <input type="number"
                                                        class="js-result form-control input-group-quantity-counter-control quantity-input"
                                                        name="quantity[]">
                                                </div>
                                            </th>
                                            <th class="table-column-pl-0">
                                                <div class="btn-group" role="group" aria-label="Edit group">
                                                    <a class="btn btn-white delete-row-btn" href="#">
                                                        <i class="tio-delete-outlined"></i>
                                                    </a>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{ route('show_list_order.index') }}"
                                class="btn btn-secondary waves-effect ml-1">Quay lại</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-3 mb-lg-5">
                            <div class="card-header">
                                <h4 class="card-header-title">Tổng giá trị hoá đơn</h4>
                            </div>
                            <div class="row justify-content-md-end mb-3">
                                <dl class="row text-sm-center">
                                    <dt class="col-sm-6">Tổng:</dt>
                                    <dd class="col-sm-6" id="total-price">0 VNĐ</dd>
                                    <dt class="col-sm-6">Giảm giá</dt>
                                    <dd class="col-sm-6">0 VNĐ</dd>
                                    <dt class="col-sm-6">Tổng tiền phải trả:</dt>
                                    <dd class="col-sm-6" id="total-payable">0 VNĐ</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var reservationSelect = document.getElementById("reservationSelect");

            reservationSelect.addEventListener("change", function() {
                var selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    document.querySelector("input[name='name']").value = selectedOption.getAttribute(
                        "data-name");
                    document.querySelector("input[name='email']").value = selectedOption.getAttribute(
                        "data-email");
                    document.querySelector("input[name='phone']").value = selectedOption.getAttribute(
                        "data-phone");
                    document.querySelector("input[name='order_date']").value = selectedOption.getAttribute(
                        "data-order-date");
                    document.querySelector("input[name='time']").value = selectedOption.getAttribute(
                        "data-time");
                    var tableSelect = document.querySelector("select[name='table_id']");
                    tableSelect.value = selectedOption.getAttribute("data-table-id");

                    // Thiết lập selected cho option của select table_id
                    Array.from(tableSelect.options).forEach(function(option) {
                        if (option.value == selectedOption.getAttribute("data-table-id")) {
                            option.selected = true;
                        }
                    });
                }
            });

            var table = document.getElementById("datatable");
            var templateRow = document.getElementById("addVariantsTemplate");
            var addItemBtn = document.getElementById("addItemBtn");

            function calculateTotal() {
                let totalPrice = 0;
                document.querySelectorAll("#addVariantsContainer tr").forEach(function(row) {
                    const price = parseFloat(row.querySelector(".price-input").value) || 0;
                    const quantity = parseInt(row.querySelector(".quantity-input").value) || 0;
                    totalPrice += price * quantity;
                });
                document.getElementById("total-price").innerText = totalPrice.toLocaleString('vi-VN') + " VNĐ";
                document.getElementById("total-payable").innerText = totalPrice.toLocaleString('vi-VN') + " VNĐ";
            }

            addItemBtn.addEventListener("click", function() {
                var newRow = templateRow.cloneNode(true);
                newRow.style.display = "table-row";
                newRow.removeAttribute("id");
                table.querySelector("tbody").appendChild(newRow);

                // Add event listener for the new row
                attachItemChangeEvent(newRow);
            });

            function attachItemChangeEvent(row) {
                var itemNameSelect = row.querySelector(".item-name-select");
                var descriptionInput = row.querySelector(".description-input");
                var priceInput = row.querySelector(".price-input");
                var quantityInput = row.querySelector(".quantity-input");

                itemNameSelect.addEventListener("change", function() {
                    var selectedOption = this.options[this.selectedIndex];
                    descriptionInput.value = selectedOption.getAttribute("data-description");
                    priceInput.value = selectedOption.getAttribute("data-price");
                    calculateTotal();
                });

                quantityInput.addEventListener("input", function() {
                    calculateTotal();
                });
            }

            // Attach change event for existing rows on page load
            document.querySelectorAll(".item-name-select").forEach(function(selectElement) {
                attachItemChangeEvent(selectElement.closest("tr"));
            });

            // Delete row functionality
            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("delete-row-btn") || event.target.closest(
                        ".delete-row-btn")) {
                    var row = event.target.closest("tr");
                    row.parentNode.removeChild(row);
                    calculateTotal();
                }
            });

            // Initial total calculation
            calculateTotal();
        });
    </script>
@endsection
