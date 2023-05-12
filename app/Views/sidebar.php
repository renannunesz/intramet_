<aside class="bd-sidebar d-flex flex-nowrap flex-column flex-shrink-0 p-3 text-white bg-Inverse " style="width: 250px; background-color:#293042"> <!--height: 95vh-->
  <nav>

    <div>

      <h5 class="text-center">Menu</h5>

      <hr>

      <div class="accordion" id="accordionPanels">

        <div class="accordion-item">

          <div class="accordion-item" id="accCadastros">
            <h2 class="accordion-header" id="panelsStayOpen-headingCadastros">

              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseCadastros" aria-expanded="false" aria-controls="panelsStayOpen-collapseCadastros">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder me-1" viewBox="0 0 16 16">
                  <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                </svg>
                Cadastros
              </button>

            </h2>
            <div id="panelsStayOpen-collapseCadastros" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingCadastros">
              <div class="accordion-body">

                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Empresas'); ?>'> - Empresas</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Envolvidos'); ?>'> - Envolvidos</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Setores'); ?>'> - Setores</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Status'); ?>'> - Status</a></li>
                </ul>

              </div>
            </div>
          </div>

          <div class="accordion-item" id="accReunioes">
            <h2 class="accordion-header" id="panelsStayOpen-headingReunioes">

              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseReunioes" aria-expanded="false" aria-controls="panelsStayOpen-collapseReunioes">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list me-1" viewBox="0 0 16 16">
                  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                  <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                </svg>
                Reuniões
              </button>

            </h2>
            <div id="panelsStayOpen-collapseReunioes" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingReunioes">
              <div class="accordion-body">

                <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 small">
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Atas'); ?>'> - Atas</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos'); ?>'> - Topicos</a></li>
                  <hr>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosAudiplanner'); ?>'> - Audiplanner</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosComercial'); ?>'> - Comercial</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosDiretoriaFinanceiro'); ?>'> - Diretoria / Comercial</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosFiscon'); ?>'> - Fiscon</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosKronos'); ?>'> - Kronos</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosLegalizacao'); ?>'> - Legalização</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosSetPessoal'); ?>'> - Set. Pessoal</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosStartBI'); ?>'> - Start BI</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosTecnologia'); ?>'> - Tecnologia</a></li>
                  <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Topicos/topicosPublicidade'); ?>'> - Publicidade</a></li>
                </ul>

              </div>
            </div>
          </div>

          <div class="accordion-item" id="accFiscon">
            <h2 class="accordion-header" id="panelsStayOpen-headingFiscon">

              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFiscon" aria-expanded="false" aria-controls="panelsStayOpen-collapseFiscon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator me-1" viewBox="0 0 16 16">
                  <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                  <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z" />
                </svg>
                Fiscon
              </button>

            </h2>
            <div id="panelsStayOpen-collapseFiscon" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFiscon">
              <div class="accordion-body">

                <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 small">
                  
                    <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('#'); ?>'> - RDA </a></li>
                    <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Cronograma'); ?>'> - Cronogramas </a></li>

                  <li>
                    <hr class="dropdown-divider">
                  </li>

                  <?php if (session()->get('usernivel') <= 2) : ?>

                    <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('public/Cronograma/acompanhamentoCronograma'); ?>'> - Status Cronogramas </a></li>
                    <li><a class="list-group-item list-group-item-action pb-2" href='<?php echo base_url('#'); ?>'> - Acompanhamento RDA </a></li>

                  <?php endif; ?>
                </ul>

              </div>
            </div>
          </div>

        </div>

      </div>

      <hr>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </div>

  </nav>
</aside>