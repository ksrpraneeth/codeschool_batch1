<nav class="navbar navbar-light bg-dark navbar-expand">
    <a href="#" class="navbar-brand text-white mx-5">Student Management System</a>
        <div class="container ">
            <div class="collapse navbar-collapse">
                <span class="glyphicon text-white">&#x2a;</span>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle  text-white" id="navbarWithDropdown"
                            data-bs-toggle="dropdown" role="button" aria-expanded="false">Master</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarWithDropdown">
                            <li>
                                <a href="#" class="dropdown-item " <button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#modalMedium1"></button>Branch</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item" <button type="button" class="btn btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#modalMedium2"></button>Hostel Type</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>

            <!-- MODAL - 1 -->
            <div class="modal fade" id="modalMedium1" tabindex="-1" aria-labelledby="modalMediumTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <p class="fw-bold fs-6 m-0 p-0">Student List</p>
                            </div>
                            <div class="btn moddalToggleBtn btn-sm btn-primary fw-bold  mx-5" data-bs-toggle="modal"
                                data-bs-target="#addStudentModal">
                                Add Data
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="heirTable mt-3" id="heirTable">
                            <div class="bg-white">
                                <table id="studentTable" class="table">
                                    <tr>
                                        <th class="font-weight-bold">S.No</th>
                                        <th class="font-weight-bold">Student ID</th>
                                        <th class="font-weight-bold">Student Class</th>
                                        <th class="font-weight-bold">Student Name</th>
                                        <th class="font-weight-bold">Student Email</th>
                                        <th class="font-weight-bold">Student DOB</th>
                                        <th class="font-weight-bold">Student Address</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- MODAL - 2 -->

            <div class="modal fade" id="modalMedium2" tabindex="-1" aria-labelledby="modalMediumTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div>
                                <p class="fw-bold fs-6 m-0 p-0">Student List</p>
                            </div>
                            <div class="btn moddalToggleBtn btn-sm btn-primary fw-bold  mx-5" data-bs-toggle="modal"
                                data-bs-target="#addHostelModel">
                                Add Data
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="heirTable mt-3" id="heirTable">
                            <div class="bg-white">
                                <table id="addHostelTable" class="table">
                                    <tr>
                                        <th class="font-weight-bold">S.No</th>
                                        <th class="font-weight-bold">Hostel Name</th>
                                        <th class="font-weight-bold">Hostel Room.No</th>
                                        <th class="font-weight-bold">Hostel Address</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- MODAL - 3 -->

            <!-- <div class="modal fade" id="modalMedium3" tabindex="-1" aria-labelledby="modalMediumTitle"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalMediumTitle">Add table 2</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In laoreet pellentesque lorem
                                sed elementum. Suspendisse maximus convallis ex. Etiam eleifend velit leo.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Action</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </nav>