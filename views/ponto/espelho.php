<div class="row">

    <div class=" col-md-6">
        <div class="card" style="border: 1px solid #d8d8d8;">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h2 style="color: gray;margin-bottom: 10%; margin-top: 10%;">Média de Horas</h2>
                </div>
            </div>
            <div id="grafico-media-hora" style="height: 250px;"></div>
        </div>
    </div>
    <div class=" col-md-6">
        <div class="card" style="border: 1px solid #d8d8d8;">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h2 style="color: gray;margin-bottom: 10%; margin-top: 10%;">Status</h2>
                </div>
            </div>
            <div id="grafico-status" style="height: 250px;"></div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 1%">

    <div class="form-group col-md-4">
        <label>Ano</label>
        <select name="ano" id="ano" class="form-control">
            <?php for ($i = 2018; $i >= 2017; $i--) { ?>
                <option value="<?= $i ?>" ><?= $i ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>Mês</label>
        <select name="mes" id="mes" class="form-control">
            <?php for ($i = 2; $i <= 13; $i++) { ?>
                <option value="<?= $i - 1 ?>" ><?= utf8_encode(strftime("%B", mktime(0, 0, 0, $i, 0, 0))); ?></option>
            <?php } ?>
        </select>
    </div>        

</div>

<div class = "row" style = "margin-top: 1%">
    <div id="table-espelho-ponto" class = " col-md-12">
        <table class = "table">
            <thead class = "thead-inverse">
                <tr>
                <tr>
                    <th>#</th>
                    <th>Dia</th>
                    <th>Entrada</th>
                    <th>Inicio Almoço</th>
                    <th>Fim Almoço</th>
                    <th>Saída</th>
                    <th>Total</th>
                </tr>
                </tr>
            </thead>

            <tbody>
                <?php 
                if(isset($viewmodel)){
                
                foreach ($viewmodel as $key => $value):
                    ?>
                    <tr>
                        <td id="total"><?= $key ?></td> 
                        <td id="total"><?= $value['data'] ?></td> 
                        <?php foreach ($value['marcacao'] as $key => $current): ?>
                            <td><?= $current ?></td> 
                        <?php endforeach; ?>
                        <td id="total"><?= $value['horas_trabalhadas'] ?></td> 
                    <?php endforeach;} ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>




<script src="<?= ROOT_URL ?>assets/lib/jquery/jquery.min.js"></script>
<script src="<?= ROOT_URL ?>assets/lib/raphael/raphael.min.js"></script>
<link rel="stylesheet" href="<?= ROOT_URL ?>assets/lib/morris.js-0.5.1/morris.css">
<script src="<?= ROOT_URL ?>assets/lib/morris.js-0.5.1/morris.js"></script>
<script>

    var atual = new Date()

    var mes = 1;
    var ano = atual.getFullYear();

    $("#mes").change(function () {
        mes = $("#mes").val();
        ini();
    });
    $("#ano").change(function () {
        ano = $("#ano").val();
        ini();
    });


    function ini() {
        $.ajax({
            type: "GET",
            url: "<?= ROOT_CLIENTE ?>marcacoes/espelhoponto/" + mes + '/' + ano,
            dataType: 'json',
            async: false,
            headers: {
                "Authorization": "<?= $_SESSION['user']['token'] ?>",
            },
            success: function (response) {
                graficos(response['relatorios']);
                var row = ' ';
                $.each(response['data'], function (key, item) {

                    row += '<tr>';
                    row += '<td>' + key + '</td>';
                    row += '<td>' + item.data + '</td>';
                    $.each(item.marcacao, function (i, horas) {
                        row += '<td>' + horas + '</td>';
                    });
                    row += '<td>' + item.horas_trabalhadas + '</td>';
                    row += '</tr>';
                });

                $("#table-espelho-ponto tbody").empty();
                $("#table-espelho-ponto tbody").append(row);
            },
            error: function (e) {

                console.log(e);
                $("#table-espelho-ponto tbody").empty();
                $("#grafico-media-hora").empty();
                $("#grafico-status").empty();
                $("#grafico-status").append('<div class="alert alert-danger">Não foram encontrados registros do período selecionado!</div>');
            }
        });
    }

    function graficos(jsonData) {

        Morris.Bar({
            element: 'grafico-media-hora',
            data: jsonData['relatorio_semana'],
            xkey: 'semana',
            ykeys: ['media'],
            labels: ['Horas'],
            colors: [
                '#0BA462',
                '#39B580',
                '#67C69D',
                '#95D7BB',
                '#95D7BB',
            ],
        }).on('click', function (i, row) {
            console.log(i, row);
        });
        Morris.Donut({
            element: 'grafico-status',
            data: jsonData['relatorio_status'],
            backgroundColor: '#ccc',
            labelColor: '#060',
            colors: [
                '#0BA462',
                '#39B580',
                '#67C69D',
                '#95D7BB',
                '#95D7BB',
            ],
            formatter: function (x) {
                return x + "%"
            }
        });
    }

    ini();

</script>