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
                    <h4 class="text-themecolor">Assign Vehicle</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item "><a href="{{ route('drivers') }}">Assigned Vehicles</a> </li>
                            <li class="breadcrumb-item ">Assign Vehicle </li>
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
                <form method="post" action="{{ route('vehicle_assign') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <!-- Column Start -->
                        <div class="col-lg-6 offset-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                       
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="driver_id"> {{ __('Select Driver') }}  </label>
                                                <select class="form-control" name="driver_id" id="driver_id">
                                                    <option value="">Select Driver</option>
                                                    @foreach($drivers as $driver)
                                                    <option value="{{$driver->id}}">{{$driver->driver_name}}</option>
                                                    @endforeach
                                                </select>
                                               
                                            </div>
                                            @error('driver_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="vehicle_id"> {{ __('Select Vehicle') }}  </label>
                                                <select class="form-control" name="vehicle_id" id="vehicle_id">
                                                    <option value="">Select Vehicle</option>
                                                    @foreach($vehicles as $vehicle)
                                                    <option value="{{$vehicle->id}}">{{$vehicle->vehicle_name}}</option>
                                                    @endforeach
                                                </select>
                                               
                                            </div>
                                            @error('vehicle_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="shift"> {{ __('Shift') }}  </label>
                                                <select class="form-control" name="shift" id="shift">
                                                    <option value="">Select Shift</option>
                                                        <option value="0">8 to 4</option>
                                                        <option value="1">4 to 12</option>
                                                        <option value="2">12 to 8</option>
                                                </select>
                                                @error('shift')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="date"> {{ __('Shift Date') }}  </label>
                                                <input type="text" name="date"  class="form-control date_picker" placeholder="{{__('Please enter date')}}">

                                            </div>
                                            @error('date')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button class="btn btn-info"> Save </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column End -->


                    </div>
                </form>
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