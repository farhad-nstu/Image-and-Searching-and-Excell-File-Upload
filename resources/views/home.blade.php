@extends('layouts.app')
@section('content')
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <a href=""><img src="" alt="logo"></a>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <li class="active">
                            <a href="" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        </li>
                        <li>
                            <!-- <a href="" aria-expanded="true"><i class="ti-id-badge"></i><span>Product
                                </span></a> -->

                                <li><a href="{{ route('products.index') }}">All Product</a></li>
                                <li><a href="{{ route('products.create') }}">Add Product</a></li>

                        </li>

                        <li>

                                <li><a href="{{ route('categories.index') }}">All Category</a></li>
                                <li><a href="{{ route('categories.create') }}">Add Category</a></li>
                        <li>
                                <li><a href="{{ route('sub_categories.index') }}">All Sub Category</a></li>
                                <li><a href="{{ route('sub_categories.create') }}">Add Sub Category</a></li>
                        </li>


                        <li>
                                <li><a href="{{ route('customers.create') }}">Add Customer</a></li>
                        <li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
