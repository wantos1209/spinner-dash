<?php use Illuminate\Support\Facades\Session; ?>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>

    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item mb-2 mt-2">
                <?php
  			// dd(session('id_bo'));
            $all_path = url()->current();
            $path = basename($all_path); 
    
            $pathvoucher = parse_url($all_path, PHP_URL_PATH);
            $pathvoucher = dirname($pathvoucher);
            
            if(request('bo') != '' && request('bo') != session('id_bo')){
                Session::put('id_bo', request('bo'));
            ?>
                <meta http-equiv="refresh"
                    content="0;url=https://lotto21top.net/RTP/tr3xd1ath/spinner/{{ $path }}">
                <?php
            } else if (session('id_bo') == '' || session('id_bo') == null) {
                Session::put('id_bo', getDataBo3()->id);
            } 
          
          ?>
                @if ($pathvoucher != '/RTP/tr3xd1ath/spinner/voucher')
                    <form id="formbo" action="{{ $path }}">
                        <select class="form-select" name="bo" id="bo"
                            onchange="document.getElementById('formbo').submit();">

                            @foreach (getDataBo() as $d)
                                <option value="{{ $d->id }}" {{ session('id_bo') == $d->id ? 'selected' : '' }}>
                                    {{ strtoupper($d->nama) }}</option>
                            @endforeach
                        </select>
                    </form>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('spinner') ? 'active' : '' }}" href="/spinner">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>dashboard </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path class="color-background opacity-6"
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path class="color-background"
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('spinner/jenisvoucher*') ? 'active' : '' }}"
                    href="/spinner/jenisvoucher">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 43 36" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                            <path class="color-background"
                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                id="Path" opacity="0.593633743"></path>
                                            <path class="color-background"
                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                    <span class="nav-link-text ms-1">Jenis Voucher</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('spinner/generatevoucher*') || (Request::is('spinner/voucher*') && !Request::is('spinner/voucherindex*')) ? 'active' : '' }} "
                    href="/spinner/generatevoucher">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 43 36" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                            <path class="color-background"
                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                id="Path" opacity="0.593633743"></path>
                                            <path class="color-background"
                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Generate Voucher</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('spinner/voucherindex*') ? 'active' : '' }} "
                    href="/spinner/voucherindex">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 43 36" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                            <path class="color-background"
                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                id="Path" opacity="0.593633743"></path>
                                            <path class="color-background"
                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Voucher</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link  {{ Request::is('spinner/voucher*') ? 'active' : '' }}" href="/spinner/voucher">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 43 36" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none"
                                fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="credit-card" transform="translate(453.000000, 454.000000)">
                                            <path class="color-background"
                                                d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                id="Path" opacity="0.593633743"></path>
                                            <path class="color-background"
                                                d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Voucher</span>
                </a>
            </li> --}}

        </ul>
    </div>
    @can('superadmin')
        <div class="dropdown ms-4 mt-3">
            <a href="/superadmin">
                <button class="btn bg-gradient-dark bg-dark">
                    Kembali ke Halaman Utama
                </button>
            </a>
        </div>
        {{-- <span class="nav-link-text ms-1">Data RTP</span> --}}
    @endcan
    <div class="sidenav-footer mx-3 ">
        <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
            <div class="full-background" style="background-image: url('/img/curved-images/white-curved.jpg')">
            </div>
            <!-- <div class="card-body text-start p-3 w-100">
      <div
        class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
        <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
      </div>
      <div class="docs-info">
        <h6 class="text-white up mb-0">Need help?</h6>
        <p class="text-xs font-weight-bold">Please check our docs</p>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard" target="_blank"
          class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
      </div>
    </div> -->
        </div>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn bg-gradient-primary mt-3 w-100">logout
            </button>
        </form>
    </div>
</aside>
