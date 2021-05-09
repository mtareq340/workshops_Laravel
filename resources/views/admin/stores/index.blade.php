
@extends('layouts.admin')

@section('content')

<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الفروع </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> الفروع
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <p>
        <a href="{{ route('admin.stores.create') }}" class="btn btn-success">اضافة جديدة</a>
        
             </p>

            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع الفروع </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                              

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard panel-body table-responsive">
                                        <table
                                            class="table table-bordered table-striped {{ count($stores) > 0 ? 'datatable' : '' }} ">
                                            <thead>
                                            <tr>
                                                <th> الرقم </th>
                                                <th> الاسم</th>
                                                <th> المنطقة</th>
                                                <th> البريد الالكتروني</th>
                                                <th> اضف كمية</th>
                                                <th> المخزن الخاص بالفرع</th>
                                                <th>طلبات الفرع</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                           @isset($stores)
                                           @foreach($stores as $index=>$store)
                                                    <tr>
                                                        <td>{{ $index + 1 }} </td>
                                                        <td>{{$store->name}} </td>
                                                        <td>{{ $store->country['name'] ?? '' }} </td>
                                                        <td>{{$store->email}} </td>
                                                        <td>  <a href="{{ route('admin.storeorders.create', $store->id) }}" class="btn btn-primary btn-sm">اضافة</a></td>
                                                        <td>  <a href="{{ route('admin.stores.stock', $store->id) }}" class="btn btn-primary btn-sm">المخزن</a></td>
                                                        <td>  <a href="{{ route('admin.stores.orders', $store->id) }}" class="btn btn-primary btn-sm">الطلبات</a></td>

                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.stores.edit',$store -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                            
                                                                <form action="{{route('admin.stores.delete',$store -> id)}}" method="post" style="display: inline-block">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('delete') }}
                                                                    <button type="submit" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 delete"><i class="fa fa-trash"></i> حذف </button>
                                                                </form> 


                                                            </div>
                                                        </td>
                                                    </tr>
                                            @endforeach

                                            @endisset
                                                


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection