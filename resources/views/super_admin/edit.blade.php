
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
                        <h3 class="card-title">Create Admin</h3>

                        <form action="{{url('dashboard/admin/update/'.$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Enter Full Name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="text" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Domains</label>


                                <select class="custom-select" name="domains[]" multiple>
                                    <option selected disabled >Choose from select menu</option>
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->id }}" {{ in_array($domain->id, $selectedDomains) ? 'selected' : '' }}>{{ $domain->name }}</option>
                                    @endforeach
                                </select>
                                @error('domains[]')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
{{--            end create table--}}



        </div>
        <!-- End of Main Content -->








        <!-- Footer -->


@include('super_admin.layout.footer')
