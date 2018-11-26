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
        <li class="header bg-red text-center">MENU UTAMA</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{set_active('dosen.dashboard')}}">
          <a href="{{ route('dosen.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{ set_active(['dosen.hasil_evaluasi','dosen.hasil_evaluasi_per_jenis','dosen.hasil_evaluasi_per_mata_kuliah','dosen.api_hasil_evaluasi_per_mata_kuliah','dosen.saran_mahasiswa']) }}">
          <a href="#"><i class="fa fa-tasks"></i> <span>Hasil Evaluasi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ set_active('dosen.hasil_evaluasi') }}"><a href="{{route('dosen.hasil_evaluasi')}}"><i class="fa fa-tasks"></i>Hasil Evaluasi Mahasiswa</a></li>
            <li class="{{ set_active('dosen.hasil_evaluasi_per_jenis') }}"><a href="{{route('dosen.hasil_evaluasi_per_jenis')}}"><i class="fa fa-tasks"></i>Hasil Evaluasi Per Jenis Indikator</a></li>
            <li class="{{ set_active(['dosen.hasil_evaluasi_per_mata_kuliah','dosen.api_hasil_evaluasi_per_mata_kuliah']) }}"><a href="{{route('dosen.hasil_evaluasi_per_mata_kuliah')}}"><i class="fa fa-tasks"></i>Hasil Evaluasi Per Mata Kuliah</a></li>
            <li class="{{ set_active('dosen.saran_mahasiswa') }}"><a href="{{ route('dosen.saran_mahasiswa') }}"><i class="fa fa-camera-retro"></i>Saran Mahasiswa</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->