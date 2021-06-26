<div class="deznav-scroll">
  <ul class="metismenu" id="menu">
    <li><a href="/dashboard" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-home-3"></i>
        <span class="nav-text">Dashboard</span>
      </a>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-list-1"></i>
        <span class="nav-text">Persetujuan</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{{ route('persetujuanjudul.index') }}">Judul & Pembimbing</a></li>
        <li><a href="{{ route('persetujuanpenguji.index') }}">Penguji</a></li>
        <li><a href="{{ route('persetujuanseminar.index') }}">Seminar Proposal</a></li>
        <li><a href="{{ route('persetujuansidang.index') }}">Sidang Skripsi</a></li>
      </ul>
    </li>
    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-reading"></i>
        <span class="nav-text">Bimbingan</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{{ route('bimbinganproposal.index') }}">Proposal Skripsi</a></li>
        <li><a href="{{ route('bimbinganskripsi.index') }}">Skripsi</a></li>
      </ul>
    </li>
    <li><a href="{{ route('verifikasiseminar.index') }}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-presentation"></i>
        <span class="nav-text">Seminar Proposal</span>
      </a>
    </li>
    <li><a href="{{ route('verifikasisidang.index') }}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-book"></i>
        <span class="nav-text">Sidang Skripsi</span>
      </a>
    </li>
  </ul>
  <div class="copyright fixed-bottom hide-on-desktop mb-0 ">
    <p><strong>E-Skripsi | Unirow Tuban </strong><br>Versi 1.0</p>
  </div>
  <!-- <p class="copyright mb-0 "><strong>E-Skripsi | Unirow Tuban </strong><br>Versi 1.0</p> -->
</div>