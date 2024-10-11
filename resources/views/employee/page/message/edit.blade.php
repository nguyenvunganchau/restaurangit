@extends('employee.layout.main')
@section('content')
    <main id="content" role="main" class="main">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <li class="breadcrumb-item"><a class="breadcrumb-link"
                                        href="ecommerce-products.html">Trang</a></li>
                                <li class="breadcrumb-item"><a class="breadcrumb-link" href="ecommerce-products.html">Tin
                                        nhắn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3 mb-lg-5">
                        <div class="card-header">
                            <h4 class="card-header-title">Chi tiết tin nhắn</h4>
                        </div>
                        <div class="row justify-content-md-start my-3  mx-3">
                            <dl class="row text-sm-left">
                                <dt class="col-sm-3">Tên khách hàng:</dt>
                                <dd class="col-sm-9">{{ $message->name_customer }}
                                </dd>
                                <dt class="col-sm-3">Email</dt>
                                <dd class="col-sm-9">{{ $message->email }}</dd>
                                <dt class="col-sm-3">Chủ đề: </dt>
                                <dd class="col-sm-9">{{ $message->subject }}
                                </dd>
                                <dt class="col-sm-3">Nội dung: </dt>
                                <dd class="col-sm-9">{{ $message->message }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-0 text-end">
                <div style="display: flex; justify-content: end; gap: 5px">
                    <form action="{{ route('update_message.post', $message->id) }}" method="post">
                        @csrf
                        @if ($message->status === 'pending')
                            <button type="submit" class="btn btn-success waves-effect">Đã phản hồi</button>
                            <input type="text" name="status" value="success" hidden>
                        @endif
                    </form>
                    <form action="{{ route('update_message.post', $message->id) }}" method="post">
                        @csrf
                        @if ($message->status === 'pending')
                            <button type="submit" class="btn btn-danger waves-effect">Huỷ</button>
                            <input type="text" name="status" value="cancel" hidden>
                        @endif
                    </form>
                    <a href="{{ route('show_list_message.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
                </div>
            </div>
        </div>
    </main>
@endsection
