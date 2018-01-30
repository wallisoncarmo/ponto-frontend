<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
    <div class="row" style="margin-top: 1%">
        <div class="form-group col-md-12">
            <h2>Justificativa</h2>
        </div>
        <div class="form-group col-md-4">
            <label>Dia</label>
            <div class="input-group" >
                <input type="text" readonly required name="periodo" class="form-control pull-right" id="datepicker">
            </div>
        </div>
        <div class="form-group col-md-4">
            <label>Tipo</label>
            <select name="tipo_justificativas_id" required class="form-control">
                <option value="" >-- Selecione --</option>
                <?php foreach ($viewmodel as $value): ?>
                    <option value="<?= $value['id'] ?>"><?= $value["tipo_justificativa"] ?></option> 
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label>Mês</label>

            <label for="comment">Justificativa:</label>
            <textarea class="form-control" required rows="5" name="justificativa" id="comment"></textarea>

        </div>
        <div class="col-md-8">
            <input class="btn btn-primary" name="submit" type="submit" value="Cadastrar"/>
        </div>
    </div>

</form>
