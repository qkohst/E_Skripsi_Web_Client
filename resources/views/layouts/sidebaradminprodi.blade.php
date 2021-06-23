<div class="deznav-scroll">
  <ul class="metismenu" id="menu">
    <li><a href="/dashboard" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-home-3"></i>
        <span class="nav-text">Dashboard</span>
      </a>
    </li>
    <li><a href="{{ route('mahasiswa.index') }}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-user-9"></i>
        <span class="nav-text">Mahasiswa</span>
      </a>
    </li>
    <li><a href="{{ route('dosen.index') }}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-user-8"></i>
        <span class="nav-text">Dosen</span>
      </a>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-book"></i>
        <span class="nav-text">Skripsi</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{{ route('persetujuankrs.index') }}">Persetujuan KRS</a></li>
        <li><a href="{{ route('seminarproposal.index') }}">Seminar Proposal</a></li>
        <li><a href="{{ route('sidangskripsi.index') }}">Sidang Skripsi</a></li>
      </ul>
    </li>
  </ul>
  <div class="copyright fixed-bottom hide-on-desktop mb-0 ">
    <p><strong>E-Skripsi | Unirow Tuban </strong><br>Versi 1.0</p>
  </div>
  <!-- <p class="copyright mb-0 "><strong>E-Skripsi | Unirow Tuban </strong><br>Versi 1.0</p> -->
</div>