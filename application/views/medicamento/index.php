<?php $this->load->view('includes/header');?>



<div class="container">
<div class="d-flex align-items-center justify-content-evenly">
    <a href="<?= base_url('medicamento/add')?> " class="btn btn-lg btn-primary mb-3">Criar Medicamento</a>
    <form method="post" action="<?php echo base_url('Medicamento/index') ?>" style="width: 20rem;">
            <div class="input-group mb-3">
                    <input type="text" placeholder="Buscar" name="nome" class="form-control" id="nome"  style="padding: 10px">
                    <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
    </form>
</div>
    <div class="row">
        <div class="card" >
            <div class="card-body">
            <?php 
                    if($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success mt-1" role="alert">
                            Ação bem-sucedida.
                        </div>
                <?php   }
                ?>
                <?php 
                    if($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger mt-1" role="alert">
                            Ocorreu um erro.
                        </div>
                <?php   }
                ?>
                <?php 
                    if($this->session->flashdata('warning')) { ?>
                        <div class="alert alert-warning mt-1" role="alert">
                            Medicamento não encontrado.
                        </div>
                <?php   }
                ?>
                <h5 class="card-title text-center">Lista de Medicamentos</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Fabricante</th>
                            <th>Forma Farmacêutica</th>
                            <th>Efeitos Colaterais</th>
                            <th>Descrição</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($resultado_busca)){?>
                            <?php $i =1; foreach($resultado_busca as $medicamento) {?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$medicamento['nome']?></td>
                                <td><?=$medicamento['fabricante']?></td>
                                <td><?=$medicamento['forma_farmaceutica']?></td>
                                <td><?=$medicamento['efeitos_colaterais']?></td>
                                <td><?=$medicamento['descricao']?></td>
                                <td>
                                    <a href="<?= base_url()?>medicamento/edit/<?=$medicamento['id']?> " class="btn btn-sm btn-primary mb-1" 
                                    style=" width: 62px; height: 32px; ">Editar</a>
                                    <a href="<?= base_url()?>medicamento/delete/<?=$medicamento['id']?> " onclick="return confirm('Tem certeza que deseja deletar?')"class="btn btn-sm btn-danger">Deletar</a>
                                </td>
                            </tr>
                            <?php }?>
                        
                        <?php } else{?>
                        
                            <?php $i =1; foreach($medicamentos as $medicamento) {?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$medicamento['nome']?></td>
                                <td><?=$medicamento['fabricante']?></td>
                                <td><?=$medicamento['forma_farmaceutica']?></td>
                                <td><?=$medicamento['efeitos_colaterais']?></td>
                                <td><?=$medicamento['descricao']?></td>
                                <td>
                                    <a href="<?= base_url()?>medicamento/edit/<?=$medicamento['id']?> " class="btn btn-sm btn-primary mb-1" 
                                    style=" width: 62px; height: 32px; ">Editar</a>
                                    <a href="<?= base_url()?>medicamento/delete/<?=$medicamento['id']?> " onclick="return confirm('Tem certeza que deseja deletar?')"class="btn btn-sm btn-danger">Deletar</a>
                                </td>
                            </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>

            


            </div>
        </div>
    </div>

</div>

<?php $this->load->view('includes/footer');?>