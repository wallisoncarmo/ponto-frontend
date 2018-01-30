<div id="msg"></div>

<div class = "row" style = "margin-top: 1%">
    <div class="col-md-8">
        <h2>Lista das sua justificativas</h2>        
    </div>
    <div class="col-md-4">
        <a class="btn btn-info pull-right" href="<?= ROOT_URL ?>ponto/justificativa">Nova</a>
    </div>

</div>
<div class = "row" style = "margin-top: 1%">
    <div id="table-espelho-ponto" class = " col-md-12">
        <table class = "table">
            <thead class = "thead-inverse">
                <tr>
                <tr>
                    <th>#</th>
                    <th>Justificativa</th>
                    <th>Periodo</th>
                    <th>Tipo</th>            
                    <th style="width: 40px;" >Ação</th>
                </tr>
                </tr>
            </thead>

            <tbody>
                <?php
                if (isset($viewmodel)) {
                    foreach ($viewmodel as $key => $value):
                        ?>
                        <tr id="<?= $value['id'] ?>">
                            <td ><?= $value['id'] ?></td> 
                            <td ><?= $value['justificativa'] ?></td> 
                            <td ><?= $value['periodo'] ?></td> 
                            <td ><?= $value['tipo_justificativa'] ?></td> 

                            <td>
                                <a class="btn btn-warning pull-right btn-block" href="<?= ROOT_URL ?>ponto/justificativa/<?= $value['id'] ?>">Editar</a>
                                <button type="button" data-id="<?= $value['id'] ?>" class="btn btn-danger btn-delete btn-block">Excluir</button>
                            </td> 
                        <?php endforeach;
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<link rel="stylesheet" href="<?= ROOT_URL ?>assets/lib/morris.js-0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= ROOT_URL ?>assets/lib/morris.js-0.5.1/morris.js"></script>
<script>


    $('.btn-delete').click(function name(parameters) {

        if (!confirm("Você deseja deletar a justificativa #" + $(this).data("id") + "?")) {
            return;
        }

        $.ajax({
            type: "DELETE",
            url: "<?= ROOT_CLIENTE ?>justificativas/" + $(this).data("id"),
            dataType: 'json',
            async: false,
            headers: {
                "Authorization": "<?= $_SESSION['user']['token'] ?>",
            },
            success: function (response) {
            },
        });
        $('#' + $(this).data("id")).remove();

    });


</script>