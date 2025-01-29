<?php
// Helpers
include 'app/Helpers/legalizacao_helper.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Métodos - Intranet</title>
    <link rel="icon" type="image/x-icon" href='<?php echo base_url('assets/img/favicon.ico') ?>'>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() . "/assets/theme/vendor/fontawesome-free/css/all.min.css"; ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() . "/assets/theme/css/sb-admin-2.min.css" ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() . "/assets/theme/vendor/datatables/dataTables.bootstrap4.min.css"; ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'navbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <nav aria-label="Page breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"> Tecnologia (T.I.) </li>
                            <li class="breadcrumb-item"> Chamados </li>
                        </ol>
                    </nav>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"> Chamados </h1>


                    <!-- Basic Card -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Opções</h6>
                        </div>
                        <div class="card-body">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#processoModal">
                                Novo Chamado
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="processoModal" tabindex="-1" role="dialog" aria-labelledby="processoModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="processoModalLabel"> Incluir Chamado </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <form action='<?php echo site_url('TI/Novo'); ?>' method="post">

                                                <input type="hidden" name="codUsuario" id="codUsuario" value='<?php echo session()->get('codigousuario'); ?>'>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDataInicio">Data Inicio</label>
                                                        <input type="date" class="form-control" id="inputDataInicio" name="inputDataInicio" placeholder="Email">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputTipoChamado">Ferramenta</label>
                                                        <select id="inputTipoChamado" name="inputTipoChamado" class="form-control" required>
                                                            <option value="">Selecione...</option>
                                                            <?php foreach ($tiposolicitacao as $tipo) : ?>
                                                                <option value='<?php echo (int)$tipo['cod']; ?>'><?php echo $tipo['nome']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputCodSolicitante">Solicitante</label>
                                                        <select id="inputCodSolicitante" name="inputCodSolicitante" class="form-control" required>
                                                            <option value="">Selecione...</option>
                                                            <?php foreach ($usuarios as $usuario) : ?>
                                                                <option value='<?php echo (int)$usuario['cod']; ?>'><?php echo $usuario['nome']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputOrdemPrioridade">Numero Ordem Prioridade</label>
                                                        <input type="text" class="form-control" id="inputOrdemPrioridade" name="inputOrdemPrioridade" placeholder="0 (Zero) para prioridade Normal">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputDescricao">Descrição</label>
                                                    <textarea class="form-control" id="inputDescricao" name="inputDescricao" rows="3" placeholder="Descrever assunto do chamado."></textarea>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Tab Chamados -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Acompanhamento de Chamados</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Data Inicio</th>
                                            <th>Ferramenta</th>
                                            <th>Descrição</th>
                                            <th>Solicitante</th>
                                            <th>Responsável</th>
                                            <th>Ord. Prioridade</th>
                                            <th>Status</th>
                                            <th>Tempo Tarefa</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cod.</th>
                                            <th>Data Inicio</th>
                                            <th>Ferramenta</th>
                                            <th>Descrição</th>
                                            <th>Solicitante</th>
                                            <th>Responsável</th>
                                            <th>Ord. Prioridade</th>
                                            <th>Status</th>
                                            <th>Tempo Tarefa</th>
                                            <th>Opções</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($chamados as $chamado) : ?>
                                            <?php switch ($chamado['codstatus']) {
                                                case 1:
                                                    $bgtx = "bg-success text-white";
                                                    break;
                                                case 2:
                                                    $bgtx = "bg-warning text-dark";
                                                    break;
                                                case 9:
                                                    $bgtx = "bg-primary text-white";
                                                    break;
                                                case 15:
                                                    $bgtx = "bg-warning text-dark";
                                                    break;                                                    
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $chamado['cod']; ?></td>
                                                <td><?php echo implode('/', array_reverse(explode('-', $chamado['datainicio']))); ?></td>
                                                <td><?php foreach ($tiposolicitacao as $tipo) if ($tipo['cod'] == $chamado['codtipo']) : echo $tipo['nome'];
                                                    endif; ?></td>
                                                <td><?php echo $chamado['descricao']; ?></td>
                                                <td><?php foreach ($usuarios as $usuario) if ($usuario['cod'] == $chamado['codsolicitante']) : echo $usuario['nome'];
                                                    endif; ?></td>
                                                <td><?php foreach ($usuarios as $usuario) if ($usuario['cod'] == $chamado['codresponsavel']) : echo $usuario['nome'];
                                                    endif; ?></td>
                                                <td>
                                                    <?php echo $chamado['ordemprioridade'] == 0 ? 'Normal' : $chamado['ordemprioridade']; ?>
                                                </td>
                                                <td class="<?php echo $bgtx; ?>"><?php foreach ($status as $stato) if ($stato['cod'] == $chamado['codstatus']) : echo $stato['nome'];
                                                                                    endif; ?>
                                                </td>
                                                <td>
                                                    <?php echo tempoDecorrido($chamado['datainicio'], date('Y-m-d')) . " Dia(s)"; ?>
                                                </td>
                                                <td>
                                                    <?php if (session()->get('nivel') <> 3) :  ?>
                                                        
                                                        <a title="Definir Responsável" data-toggle="modal" data-target="#defResponsavel-<?php echo $chamado['cod']; ?>" href="#"><i class="fas fa-user-check"></i></a>                                                    
                                                        <a title="Prioridade" data-toggle="modal" data-target="#mudarPrioridade-<?php echo $chamado['cod']; ?>" href="#"><i class="fas fa-sync"></i></i></a>
                                                        <a title="Status" data-toggle="modal" data-target="#mudarStatus-<?php echo $chamado['cod']; ?>" href="#"><i class="fas fa-forward"></i></i></a>
                                                        <a title="Finalizar" href='<?php echo site_url('TI/finalizarChamado') . '/' . $chamado['cod']; ?>'><i class="fas fa-check"></i></i></a>
                                                        <a title="Deletar" href='<?php echo site_url('TI/deletarChamado') . '/' . $chamado['cod']; ?>'><i class="fas fa-trash"></i></a>

                                                    <?php endif; ?>

                                                    <a title="Editar" data-toggle="modal" data-target="#editarChamado-<?php echo $chamado['cod']; ?>" href="#"><i class="fas fa-pen"></i></a>


                                                </td>

                                                <div class="modal fade" id="defResponsavel-<?php echo $chamado['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="defResponsavelModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo site_url('TI/definirResponsavel'); ?>' method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="codChamado" id="codChamado" value='<?php echo $chamado['cod']; ?>'>

                                                                    <div class="">

                                                                        <div class="form-group">
                                                                            <label for="inputResponsavel">Responsável</label>
                                                                            <select id="inputResponsavel" name="inputResponsavel" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <option value='16'>Josimar Gabriel</option>
                                                                                <option value='15'>João Victor</option>
                                                                                <option value='1'>Renan Nunes</option>
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="editarChamado-<?php echo $chamado['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="editarChamadoModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo site_url('TI/editarChamado'); ?>' method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="codChamado" id="codChamado" value='<?php echo $chamado['cod']; ?>'>

                                                                    <div class="">

                                                                        <div class="form-group">
                                                                            <label for="inputTipoChamado">Tipo Chamado</label>
                                                                            <select id="inputTipoChamado" name="inputTipoChamado" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($tiposolicitacao as $tipo) : ?>
                                                                                    <option value='<?php echo (int)$tipo['cod']; ?>'><?php echo $tipo['nome']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputCodSolicitante">Solicitante</label>
                                                                            <select id="inputCodSolicitante" name="inputCodSolicitante" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($usuarios as $usuario) : ?>
                                                                                    <option value='<?php echo (int)$usuario['cod']; ?>'><?php echo $usuario['nome']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="inputDescricao">Descrição</label>
                                                                            <textarea class="form-control" id="inputDescricao" name="inputDescricao" rows="3"><?php echo $chamado['descricao']; ?></textarea>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="mudarPrioridade-<?php echo $chamado['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="mudarPrioridadeModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo site_url('TI/mudarPrioridade'); ?>' method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="codChamado" id="codChamado" value='<?php echo $chamado['cod']; ?>'>

                                                                    <div class="">

                                                                        <div class="form-group">
                                                                            <label for="inputTipoChamado">Definir Prioridade</label>
                                                                            <input type="text" class="form-control" id="inputOrdemPrioridade" name="inputOrdemPrioridade" placeholder="0 (Zero) para prioridade Normal">
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="mudarStatus-<?php echo $chamado['cod']; ?>" tabindex="-1" role="dialog" aria-labelledby="mudarStatusModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">

                                                                <form action='<?php echo site_url('TI/mudarStatus'); ?>' method="post" enctype="multipart/form-data">

                                                                    <input type="hidden" name="codChamado" id="codChamado" value='<?php echo $chamado['cod']; ?>'>

                                                                    <div class="">

                                                                        <div class="form-group">
                                                                            <label for="inputCodStatus">Status</label>
                                                                            <select id="inputCodStatus" name="inputCodStatus" class="form-control" required>
                                                                                <option value="">Selecione...</option>
                                                                                <?php foreach ($status as $stato) : ?>
                                                                                    <option value='<?php echo (int)$stato['cod']; ?>'><?php echo $stato['nome']; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>

                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() . "/assets/theme/vendor/jquery/jquery.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "/assets/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"; ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() . "/assets/theme/vendor/jquery-easing/jquery.easing.min.js"; ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() . "/assets/theme/js/sb-admin-2.min.js"; ?>"></script>

    <!-- Page level plugins-->
    <script src="<?php echo base_url() . "/assets/theme/vendor/datatables/jquery.dataTables.min.js"; ?>"></script>
    <script src="<?php echo base_url() . "/assets/theme/vendor/datatables/dataTables.bootstrap4.min.js"; ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() . "/assets/theme/js/demo/datatables-demo.js"; ?>"></script>

</body>

</html>