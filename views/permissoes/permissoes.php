  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row">
          <div class="col-md-12" style="color:#555;margin-bottom:-20px;">
              <ul class="breadcrumb">
                  <li><a href="" style="color:#555;">Permissões</a></li>
                  <li><a href="" style="color:#555;">Cadastro</a></li>
              </ul>
          </div>
      </div>
  </section>

  <!-- Main content -->
  <section class="content">

      <div class="box">
          <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-hand-pointer-o"></i> <b>Ação</b></h3>
          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-md-12">
                      <a href="<?=BASE_URL?>permissions/add" class="btn btn-app bg-default btn-touch">
                          <i class="fa fa-users"></i> Novo Grupo
                      </a>
                      <a href="<?=BASE_URL?>permissions/items" class="btn btn-app bg-default btn-touch"><i
                              class="fa fa-plus-square"></i> Nova
                          Permissão
                      </a>
                      <!-- <button class="btn btn-app bg-default btn-touch" data-toggle="modal"
                          data-target="#modal-vendor"><i class="fa fa-plus-square"></i> Nova
                          Permissão
                      </button> -->
                  </div>
              </div>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- Default box -->
      <div class="box">
          <div class="box-body">
              <table class="table table-bordered table-striped dt-responsive tabela-res" width="100%">
                  <thead>
                      <tr>
                          <th>Nome da permissão</th>
                          <th>Qtd. de Colaboradores ativos</th>
                          <th>Ações</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php foreach($list as $item): ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $item['nome_group'] ?></td>
                          <td class="text-capitalize"><?php echo $item['total_users'] ?></td>
                          <td>
                              <a href="<?=BASE_URL?>permissions/edit/<?=$item['id_group']?>"
                                  class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                              <a href="<?=BASE_URL?>permissions/del/<?=$item['id_group']?>"
                                  class="btn btn-danger btn-xs <?= ($item['total_users'] != 0)?'disabled':''; ?>"><i
                                      class="fa fa-times"></i> Excluir
                              </a>
                          </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->