<div class="deznav-scroll">
  <ul class="metismenu" id="menu">
    <li><a href="/dashboard" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-home-3"></i>
        <span class="nav-text">Dashboard</span>
      </a>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-folder-8"></i>
        <span class="nav-text">Data Master</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{{ route('fakultas.index') }}">Fakultas</a></li>
        <li><a href="{{ route('prodi.index') }}">Program Studi</a></li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Jabatan Dosen</a>
          <ul aria-expanded="false">
            <li><a href="{{ route('jabatanstruktural.index') }}">Jabatan Struktural</a></li>
            <li><a href="{{ route('jabatanfungsional.index') }}">Jabatan Fungsional</a></li>
          </ul>
        </li>
        <li><a href="{{ route('adminprodi.index') }}">Admin Prodi</a></li>
      </ul>
    </li>
    <li><a href="{{ route('skripsi.index') }}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-book"></i>
        <span class="nav-text">Skripsi</span>
      </a>
    </li>
  </ul>
  <div class="copyright fixed-bottom hide-on-desktop mb-0 ">
    <p><strong>E-Skripsi | Unirow Tuban </strong><br>Versi 1.0</p>
  </div>
  <!-- <p class="copyright mb-0 "><strong>E-Skripsi | Unirow Tuban </strong><br>Versi 1.0</p> -->
</div>