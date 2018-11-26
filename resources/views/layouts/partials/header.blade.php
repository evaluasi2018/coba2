<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>E</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI-</b>Evaluasi</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="" style="pointer-events: none;">
              <?php 

                $tanggal = mktime(date('m'), date("d"), date('Y'));
                echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
                date_default_timezone_set("Asia/Jakarta");
                $jam = date ("H:i:s");
                echo " | Pukul : <b> " . $jam . " " ." </b> ";
                $a = date ("H");
                
              ?>
            </a>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu bg-blue">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs" style="text-transform: uppercase;">
                @if (Auth::guard('admin')->check())
                {{ Auth::guard('admin')->user()->nm_admin }}
                  @elseif (Session::get('akses','Mahasiswa'))
                    {{ Session::get('nama') }}
                    @elseif(Session::get('akses','Dosen'))
                      {{ Session::get('nama') }}
                  @endif
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header bg-blue">
                <img src="{{asset('bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p style="text-transform: uppercase;">
                    @if (Auth::guard('admin')->check())
                      {{ Auth::guard('admin')->user()->nm_admin }}
                        @elseif (Session::get('akses','Mahasiswa'))
                      {{ Session::get('nama') }}
                      @elseif(Session::get('akses','Dosen'))
                        {{ Session::get('nama') }}
                    @endif
                <p>
                  
                </p>
                  <small>
                    @if (Auth::guard('admin')->check())
                      {{ Auth::guard('admin')->user()->created_at }}
                      @elseif (Session::get('akses','Mahasiswa'))
                      {{ Session::get('nip') }}
                      @elseif(Session::get('akses','Dosen'))
                        {{ Session::get('nip') }}
                    @endif
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    @if (Auth::guard('admin')->check())
                      <button class="btn bg-blue btn-flat" data-toggle="modal" data-target="#modalUbahPassword" data-backdrop="static" data-keyboard="false"><i class="fa fa-edit"></i>&nbsp;Ubah Password</button>
                    @endif
                </div>
                <div class="pull-right">
                    @if (Auth::guard('admin')->check())
                      <a href="{{ route('admin.logout') }}" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i>&nbsp;Sign out</a>
                      @elseif(Session::get('akses','Mahasiswa '))
                      <a href="{{ route('mahasiswa.logout') }}" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i>&nbsp;Sign out</a>
                      @elseif(Session::get('akses','Dosen'))
                      <a href="{{ route('dosen.logout') }}" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i>&nbsp;Sign out</a>
                    @endif
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  @include('layouts/partials/admin/form_ubah_password_admin')