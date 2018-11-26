<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            @if (Auth::guard('admin')->check())
              {{ Auth::guard('admin')->user()->created_at }}
              @elseif (Session::get('akses','Mahasiswa'))
              {{ Session::get('nama') }}
              @elseif(Session::get('akses','Dosen'))
                {{ Session::get('nama') }}
            @endif
          </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-id-card"></i>
            @if (Auth::guard('admin')->check())
              {{ Auth::guard('admin')->user()->created_at }}
              @elseif (Session::get('akses','Mahasiswa'))
              {{ Session::get('nip') }}
              @elseif(Session::get('akses','Dosen'))
                {{ Session::get('nip') }}
            @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{set_active('mahasiswa.dashboard')}}">
          <a href="{{ route('mahasiswa.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class=" {{set_active('mahasiswa.daftar_matkul')}}">
          <a href="{{ route('mahasiswa.daftar_matkul', [Session::get('nip'),Session::get('klsSemId')]) }}"><i class="fa fa-book"></i> <span>Daftar Mata Kuliah</span>
          </a>
        </li>        

        {{-- <li class="{{set_active('mahasiswa.berikan_evaluasi')}}">
          <a href="{{ route('mahasiswa.berikan_evaluasi') }}"><i class="fa fa-dashboard"></i> <span>Berikan Evaluasi</span>
          </a>
        </li> --}}

        <li class="treeview {{ set_active(['mahasiswa.riwayat_evaluasi','mahasiswa.riwayat_saran','mahasiswa.riwayat_evaluasi_per_matkul']) }}">
          <a href="#"><i class="fa fa-tasks"></i> <span>Riwayat</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ set_active('mahasiswa.riwayat_evaluasi') }}"><a href=" {{route('mahasiswa.riwayat_evaluasi') }}"><i class="fa fa-tasks"></i>Riwayat Evaluasi</a></li>
            <li class="{{ set_active('mahasiswa.riwayat_evaluasi_per_matkul') }}"><a href=" {{route('mahasiswa.riwayat_evaluasi_per_matkul',[Session::get('nip'),Session::get('klsSemId')]) }}"><i class="fa fa-tasks"></i>Riwayat Per Mata Kuliah</a></li>
            <li class="{{ set_active('mahasiswa.riwayat_saran') }}"><a href=" {{route('mahasiswa.riwayat_saran') }}"><i class="fa fa-tasks"></i>Riwayat Saran</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->