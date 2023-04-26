<nav class="navbar navbar-expand-sm py-0">

  <div class="d-flex">

    <div class="mx-4 p-1">

      <div class="text-center" style="width: 200px; height:100%;">
        <a class="navbar-item" href='<?php echo base_url('public/Home'); ?>'>
          <img src='<?php echo base_url('assets/img/logo.png') ?>' width="50" height="40">
        </a>
      </div>

    </div>

    <div class="d-flex align-items-end p-1">
      <h4 class="">Intranet - Grupo Métodos Soluções Empresariais</h4>
    </div>

    <div class="d-flex position-absolute end-0 me-3 p-1 align-items-center" id="">

      <div class="mx-2 d-flex align-self-end">
        <h5 class="text-center "><?php echo session()->get('user'); ?> </h5>
      </div>

      <div class="">
        <a class="btn is-link btn-warning " href='<?php echo base_url('public/Login/signOut'); ?>'> <strong>Sair</strong> </a>
      </div>

    </div>

  </div>

</nav>
