
@include('super_admin.layout.header')
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    @include('super_admin.layout.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            @include('super_admin.layout.topbar')

            <!-- /.container-fluid -->


{{--            start table--}}
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">All Domains List</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Domains</h6>
                   
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Domain Name</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($domains as $domain)

                                    <tr>
                                        <td>{{$domain->id}}</td>

                                            <td><a href="http://{{ $domain->name }}:8000" target="blank">
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


@include('super_admin.layout.footer')
