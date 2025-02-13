<x-layout_admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Category Content Management</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <form method="GET" action="#" class="me-2">
                                <input type="text" name="search" class="form-control" placeholder="Cari User...">
                            </form>
                            <button type="button" class="btn btn-primary m-1">Search</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Location</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><button type="button" class="btn btn-outline-success m-1">Add</button><button
                                        type="button" class="btn btn-outline-secondary m-1">Edit</button><button
                                        type="button" class="btn btn-outline-danger m-1">Delete</button></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-layout_admin>
