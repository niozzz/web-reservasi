@extends('template.main')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-bag f-s-40 color-primary"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>2780</h4>
                        <p class="m-b-0">New Projects</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-comment f-s-40 color-success"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>178</h4>
                        <p class="m-b-0">Total Message</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-vector f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>$27647</h4>
                        <p class="m-b-0">Total Earnings</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="ti-location-pin f-s-40 color-danger"></i></span>
                    </div>
                    <div class="media-body text-right">
                        <h4>278</h4>
                        <p class="m-b-0">Total Visitor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    {{-- <div class="row">
        
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-title">
                    <h4>Recent Orders </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Asus-565</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img class="w-35" src="{{ asset('template-dashboard') }}/images/avatar/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



</div>
@endsection