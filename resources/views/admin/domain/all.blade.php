
@include('super_admin.layout.header')
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            

            <!-- /.container-fluid -->


{{--            start table--}}
            <div class="container-fluid">

                <!-- Page Heading -->
                <br><br><br>
                <center>
                    <h1 class="h3 mb-2 text-gray-800">{{$domain}}</h1>

                </center>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">You can also visit your other domains below:</h6>
                        <a href="{{url('dashboard-admin/domain')}}" class="btn btn-info float-right btn-sm">Back to Dashboard</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                
                                <tbody>
                                @foreach($domains as $domain)

                                    <tr>

                                            <td><a href="{{$domain->name}}">
                                                {{$domain->name}}
                                            <i class="fas fa-external-link-square-alt"></i>
                                        </a>
                                        </td>
                                        
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
{{--            end table--}}



        </div>
        <!-- End of Main Content -->








        <!-- Footer -->

