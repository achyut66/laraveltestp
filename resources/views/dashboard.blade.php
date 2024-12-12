<x-app-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Add the Bootstrap CSS here (in the <head> section) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Qyq06qzWqRaTG7jsm2hb8h4jOk7ChzkZIaovq9ojkpqIbxttYZ2/5PS8I7fNw8Is" crossorigin="anonymous">

    <div class="py-12">
        <form method="post" action="{{ route('personaldata.save')}}">
            @csrf
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-center">Personal Information()
                         <span>
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">ViewInfo</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="modal-body">
                                            <table class="table table-bordered table-responsive striped">
                                                <tr>
                                                    <td>S.no</td>
                                                    <td>Name</td>
                                                    <td>Address</td>
                                                    <td>Contact</td>
                                                    <td>Profession</td>
                                                </tr>

                                                <tr>
                                                    <td>#</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </table>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ends modal -->
                        </span></div>
                    <div class="text-left">
                        <div class="titleInput">Name:<span><input class="form-control" type="text" name="p_name"
                                    id="p_name"></span></div>
                    </div>
                    <div class="text-left">
                        <div class="titleInput">Contact Number:<span><input class="form-control" type="text"
                                    name="p_contact" id="p_contact"></span></div>
                    </div>
                    <div class="text-left">
                        <div class="titleInput">Address:<span><input class="form-control" type="text" name="p_address"
                                    id="p_address"></span></div>
                    </div>
                    <div class="text-left">
                        <div class="titleInput">Profession:<span>
                                <select class="form-control" name="p_profession">
                                    <option value="">--Select--</option>
                                    <option value="1">Engineer</option>
                                    <option value="2">Mechanic</option>
                                    <option value="3">Social Worker</option>
                                    <option value="4">Teacher</option>
                                </select>
                            </span></div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success">SAVE</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Add the Bootstrap JS bundle right before the closing </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0OBM4rjIXd/cQX61qyyPqeqFb8lPbgm7jw5zzh7UGECqfe+E"
        crossorigin="anonymous"></script>
    <script>
        // Close the modal programmatically
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.hide();

    </script>
</x-app-layout>