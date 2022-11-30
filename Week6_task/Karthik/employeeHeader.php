<div class="header d-flex col-lg-5 w-100 p-4 align-items-center border-bottom justify-content-between">
                <h5 class="fw-semibold m-0  rounded-2">Employee</h5>
                <div class="d-flex gap-3">
                    <button type="button" class="btn profile d-flex align-items-center" onclick="location.assign('profile.php')">
                        <p class="m-0 px-1">Profile</p>
                    </button>
                    <button type="button" class="btn home d-flex align-items-center"
                        onclick="location.assign('employeeDashboard.php')">
                        <p class="m-0 p-0"> Home</p>
                    </button>
                    <button type="button" class="btn btn-danger  d-flex  align-items-center"
                        onclick="location.assign('apis/logout.php')">
                        <i class="bi bi-escape"></i>
                    </button>
                </div>
            </div>
            <div class="subMenu d-flex align-items-center gap-3 border-bottom bg-secondary bg-opacity-10 p-2 flex-wrap">
                <button type="button" class="btn  attendance d-flex border-0 rounded-2 align-items-center"
                    onclick="location.assign('addAttendance.php')">
                   Attendance
                </button>
                <button type="button" class="btn chat d-flex  align-items-center"
                    onclick="location.assign('messages.php')">
                    Chat
                </button>
            </div>
        </div>