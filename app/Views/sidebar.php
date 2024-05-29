<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src='<?php echo base_url() . "/assets/img/logo.png"; ?>' alt="" width="40" height="40" class="me-2">
        </div>
        <div class="sidebar-brand-text mx-2"> Intranet G.MTDS </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href='<?php echo base_url('Home'); ?>'>
            <i class="fas fa-fw fa-bookmark"></i>
            <span> Inicio </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Cadastros
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gerais</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cadastros Gerais:</h6>
                <a class="collapse-item" href='<?php echo base_url('Cadastros/Clientes'); ?>'>Clientes</a>                
                <a class="collapse-item" href="#">Envolvidos</a>
                <a class="collapse-item" href="#">Setores</a>
                <a class="collapse-item" href='<?php echo base_url('Cadastros/Status'); ?>'>Status</a>
                <a class="collapse-item" href='<?php echo base_url('Cadastros/Servicos'); ?>'>Serviços Processos</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Movimentos
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFisCon" aria-expanded="true" aria-controls="collapseFisCon">
            <i class="fas fa-fw fa-folder"></i>
            <span>FisCon</span>
        </a>
        <div id="collapseFisCon" class="collapse" aria-labelledby="headingFisCon" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cronogramas:</h6>
                <a class="collapse-item" href='<?php echo base_url('Fiscon/Empresas'); ?>'>Empresas (Cronograma)</a>
                <a class="collapse-item" href="#">Contábil</a>
                <a class="collapse-item" href='<?php echo base_url('Fiscon/CronoFiscal'); ?>'>Fiscal</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Acompanhamentos:</h6>
                <a class="collapse-item" href="#">RDA</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdministrativo" aria-expanded="true" aria-controls="collapseAdministrativo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Administrativo</span>
        </a>
        <div id="collapseAdministrativo" class="collapse" aria-labelledby="headingAdministrativo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Reuniões:</h6>
                <a class="collapse-item" href="#">Atas</a>
                <a class="collapse-item" href="#">Topicos</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Setores:</h6>
                <a class="collapse-item" href="#">Audiplanner</a>
                <a class="collapse-item" href="#">Comercial</a>
                <a class="collapse-item" href="#">Diretoria/Comercial</a>
                <a class="collapse-item" href="#">Fiscon</a>
                <a class="collapse-item" href="#">Kronos</a>
                <a class="collapse-item" href="#">Legalização</a>
                <a class="collapse-item" href="#">Set. Pessoal</a>
                <a class="collapse-item" href="#">Start BI</a>
                <a class="collapse-item" href="#">Tecnologia</a>
                <a class="collapse-item" href="#">Publicidade</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLegalização" aria-expanded="true" aria-controls="collapseLegalização">
            <i class="fas fa-fw fa-folder"></i>
            <span>Legalização</span>
        </a>
        <div id="collapseLegalização" class="collapse" aria-labelledby="headingLegalização" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Processos:</h6>
                <a class="collapse-item" href='<?php echo base_url('Legalizacao/Processos'); ?>'>Controle</a>
                <a class="collapse-item" href='<?php echo base_url('Legalizacao/Finalizados'); ?>'>Finalizados</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCRM" aria-expanded="true" aria-controls="collapseCRM">
            <i class="fas fa-fw fa-folder"></i>
            <span>CRM</span>
        </a>
        <div id="collapseCRM" class="collapse" aria-labelledby="headingCRM" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Acompanhamentos:</h6>
                <a class="collapse-item" href="#">Propostas</a>
            </div>
        </div>
    </li> 
    
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtil" aria-expanded="true" aria-controls="collapseUtil">
            <i class="fas fa-fw fa-folder"></i>
            <span>Utilitários</span>
        </a>
        <div id="collapseUtil" class="collapse" aria-labelledby="headingCRM" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Arquivos:</h6>
                <a class="collapse-item" href='<?php echo base_url('/Utilitarios/arqAntaqMensais'); ?>'>ANTAQ - BP/DRE Mensal</a>
                <a class="collapse-item" href='<?php echo base_url('/Utilitarios/arqAntaqAnuais'); ?>'>ANTAQ - BP/DRE Anual</a>
            </div>
        </div>
    </li> 

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->