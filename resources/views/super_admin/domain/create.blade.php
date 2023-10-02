
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


{{--            start create form--}}
            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Create Domain</h3>

                        <form action="{{route('store.domain.superadmin')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Domain Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
{{--            end create table--}}



        </div>
        <!-- End of Main Content -->








        <!-- Footer -->


@include('super_admin.layout.footer')
