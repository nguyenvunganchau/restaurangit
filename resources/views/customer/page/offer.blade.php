@extends('customer.layout.main')

@section('content')
    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .sidebar h2 {
            margin-bottom: 20px;
        }

        .category-list {
            list-style-type: none;
            padding: 0;
        }

        .category-list li {
            margin-bottom: 10px;
        }

        .category-list li a {
            text-decoration: none;
            color: #000;
            /* color: #fff; */
            font-size: 18px;
            display: block;
            padding: 10px 15px;
            /* background-color: #ccc; */
            border: 1px solid #ccc;
            /* background-color: #85ab00; */
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .category-list li a:hover {
            background-color: #85ab00;
            color: #fff;
        }
    </style>

    <div class="container clearfix common-pad offer-main">
        <div class="row">
            <!-- Left Sidebar for Categories -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="sidebar sec-header">
                    <a href="{{ route('show_offer.index') }}">
                        <h2>Danh Mục</h2>
                    </a>
                    <ul class="category-list">
                        @foreach ($categories as $category)
                            <li><a
                                    href="{{ route('show_category.index', ['category_id' => $category->category_id]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right Content for Menu Items -->
            <div class="col-lg-9 col-md-8">
                <div class="sec-header">
                    <h2>Menu</h2>
                    <h3>Menu của nhà hàng rất đa dạng</h3>
                </div>
                <div class="row">
                    @foreach ($menu as $item)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4"
                            style="padding-bottom: 10px; padding-left: 5px; padding-right: 5px">
                            <div class="offer-deal-dark">
                                <div class="offer-main">
                                    <div class="img-holder">
                                        <img src="{{ $item->image_menu ? Storage::url($item->image_menu) : asset('default-image.jpg') }}"
                                            width="100%" style="height: 150px" class="img-responsive">
                                    </div>
                                    <div class="offer-content" style="padding-left: 15px !important; padding: 15px">
                                        <h2 style="height: 68px">{{ $item->item_name }}</h2>
                                        @if ($item->description)
                                            <p style="margin: 0 0 1rem; height: 54px">{{ $item->description }}</p>
                                        @else
                                            <p style="margin: 0 0 1rem; padding: 0 0 54px"></p>
                                        @endif
                                        @if ($item->discount)
                                            <div class="offer-b-price"
                                                style="margin-left: unset; float: unset; display: flex">
                                                <p>{{ number_format($item->price) }}<sup>đ</sup></p>
                                                <p style="font: 1.5em / 0.9em Playball, sans-serif; padding-left: 10px">
                                                    <del>{{ number_format($item->discount) }}</del><sup>đ</sup>
                                                </p>
                                            </div>
                                        @else
                                            <div class="offer-b-price" style="margin-left: unset; float: unset">
                                                <p>{{ number_format($item->price) }}<sup>đ</sup></p>
                                            </div>
                                        @endif
                                        {{-- <div class="offer-b-but" style="float: unset; margin: 0 0 0.5rem"><a href="#"
                                                class="res-btn">Đặt ngay</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
