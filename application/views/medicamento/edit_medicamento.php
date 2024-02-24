<?php $this->load->view('includes/header');?>

<a href="<?= base_url('medicamento/index')?> " class="btn btn-lg
 btn-primary " style="position: relative; bottom: 2.5em; left: 1em;">Voltar</a>
<div class="container d-flex justify-content-center align-items-center overflow-hidden" style="position: relative; bottom: 2.5em;">
    
    <div class="row">
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Editar Medicamento</h5>
                <form method="post" action="<?= base_url()?>medicamento/edit/<?=$id?>">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" placeholder="Nome" 
                        value="<?=$medicamento->nome?>" name="nome" class="form-control" id="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="fabricante" class="form-label">Fabricante</label>
                        <input type="text" placeholder="Fabricante" 
                        value="<?=$medicamento->fabricante?>" name="fabricante" class="form-control"
                            id="fabricante" required>
                    </div>
                    <div class="mb-3">
                        <label for="forma_farmaceutica" class="form-label">Forma Farmacêutica</label>
                        <input type="text" placeholder="Forma Farmacêutica" 
                        value="<?=$medicamento->forma_farmaceutica?>" name="forma_farmaceutica"
                            class="form-control" id="forma_farmaceutica" required>
                    </div>
                    <div class="mb-3">
                        <label for="efeitos_colaterais" class="form-label">Efeitos Colaterais</label>
                        <input type="text" placeholder="Efeitos Colaterais" 
                        value="<?=$medicamento->efeitos_colaterais?>" name="efeitos_colaterais"
                            class="form-control" id="efeitos_colaterais" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" placeholder="Descrição" 
                        value="<?=$medicamento->descricao?>" name="descricao" class="form-control" id="descricao"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
                <?php 
                    if($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success mt-1" role="alert">
                            Atualizado com sucesso.
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


            </div>
        </div>
    </div>
</div>

<?php $this->load->view('includes/footer');?>