@extends('layouts.app')

@section('content')
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- Container Fluid -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Assigned Vehicles</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item ">Assigned Vehicles </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
        </div>
         <!-- ============================================================== -->
            <!-- Container-->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Info box Content -->
                <!-- ============================================================== -->
            
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row"> 

                    <!-- Column Start -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="driverTable">
                                            <thead>
                                                <tr>
                                                    <th>Driver Name</th>
                                                    <th>Vehicle Name</th>
                                                    <th>Shift</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($vehicles))
                                                @foreach($vehicles as $vehicle)
                                                <tr>
                                                    <td>{{ $vehicle->driver_id }}</td>
                                                    <td>{{ $vehicle->vehicle_id }}</td>
                                                    <td>{{ $vehicle->shift }}</td>
                                                    <td>{{ $vehicle->date }}</td>
                                                    <td>
                                                         <a href=" {{route('edit_assign_vehicle', ['id' => encrypt($vehicle->id)])}}" class="btn btn-info">Edit</a>

                                                        <a href=" {{route('del_vehicle_assign', ['id' => encrypt($vehicle->id)])}}" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">No, Record found!!</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>




                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

@endsection