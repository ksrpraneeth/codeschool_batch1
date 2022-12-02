<?php

function getHeader($type)
{
    $return = '<div class="header bg-white p-3 d-flex align-items-center justify-content-between">
    <!-- Left of Header -->
    <div class="left d-flex align-items-center">
        <!-- Brand -->
        <div class="brand d-flex align-items-center">
            <!-- Logo Image -->
            <div class="logo">
                <img width="40px" src="./assets/images/logo.png" alt="" />
            </div>

            <!-- Logo Text -->
            <div class="logoText ms-2 flex-column justify-content-center d-none d-sm-flex">
                <h5 class="m-0 fw-bold">IFMIS</h5>
                <span class="fs-12">&copy; Governament of India</span>
            </div>
        </div>

        <!-- Mobile Menu Btn -->';

    if ($type == "moduleView") {
        $return .= '<button class="btn ms-2 fs-3 d-block d-md-none" id="mobileMenuBtn">
                        <i class="bi bi-list"></i>
                    </button>';
    }
    $return .= '
        </div>

        <!-- Right -->
        <div class="right">
            <!-- Menu -->
            <ul class="list-unstyled m-0 d-flex">
                <!-- Modules Button -->
                <li>
                    <button class="btn" onclick="location.href=\'dashboard.php\'">
                        <i class="bi bi-boxes"></i>
                        <span class="d-none d-sm-inline">Modules</span>
                    </button>
                </li>

                <!-- Profile Button -->
                <li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person"></i>
                            <span>' . $_SESSION["userName"] . '</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-item" role="button" onclick="location.href=\'logout.php\'">
                                    <i class="bi bi-escape"></i>
                                    <span>Logout</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

';
return $return;
}
