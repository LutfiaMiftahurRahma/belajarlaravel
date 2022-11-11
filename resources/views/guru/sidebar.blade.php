<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
  <script type="text/javascript">
    try{ace.settings.loadState('sidebar')}catch(e){}
  </script>

  <ul class="nav nav-list">
    <li class="">
      <a href="{{route('guruhome')}}">
        <i class="menu-icon fa fa-tachometer"></i>
        <span class="menu-text"> Dashboard </span>
      </a>

      <b class="arrow"></b>
    </li>

    @foreach($namakh as $nk)
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-book"></i>
        <span class="menu-text"> {{ $nk->kh_nama }} </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        @foreach($datauji as $data)
          @if ($nk->kh_nama == $data->kh_nama)
          <li class="">
            <a href="{{route('rekap.guru', $data->uji_id)}}">
              <i class="menu-icon fa fa-caret-right"></i>
              {{ $data->tingkat }}&nbsp;{{ $data->k_nama }}
            </a>

            <b class="arrow"></b>
          </li>
          @endif
        @endforeach
      </ul>         
    </li>
    @endforeach
    
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-laptop"></i>
        <span class="menu-text"> Wali Kelas </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        @foreach($walikelas as $wali)
        <li class="">
          <a href="{{route('kelas.guru', $wali->k_id)}}">
            <i class="menu-icon fa fa-caret-right"></i>
            {{ $wali->tingkat }}&nbsp;{{ $wali->k_nama }}
          </a>

          <b class="arrow"></b>
        </li>
        @endforeach
      </ul>         
    </li>
   
  </ul><!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>