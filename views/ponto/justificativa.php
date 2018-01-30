<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
    <div class="row" style="margin-top: 1%">
        <div class="form-group col-md-12">
            <h2>Justificativa</h2>
        </div>
        <div class="form-group col-md-4">
            <label>Dia</label>
            <div class="input-group" >
                <input type="text" value="<?= isset($viewmodel['justificativa']['periodo']) ? $viewmodel['justificativa']['periodo'] : '' ?>" readonly required name="periodo" class="form-control pull-right" id="datepicker">
            </div>
        </div>
        <div class="form-group col-md-4">
            <label>Tipo</label>
            <select name="tipo_justificativas_id" required class="form-control">
                <option value="" >-- Selecione --</option>
                <?php foreach ($viewmodel['tipo_justificativas'] as $value): ?>
                    <option <?php
                    if (isset($viewmodel['justificativa']['tipo_justificativas_id'])) {
                        if ($viewmodel['justificativa']['tipo_justificativas_id'] == $value['id'])
                            echo 'selected';
                    }
                    ?>   value="<?= $value['id'] ?>"><?= $value["tipo_justificativa"] ?></option> 
                    <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-12">
            <label for="comment">Justificativa:</label>
            <textarea class="form-control" required rows="5" name="justificativa" id="comment"><?= isset($viewmodel['justificativa']['justificativa']) ? $viewmodel['justificativa']['justificativa'] : '' ?></textarea>

        </div>
        <div class="col-md-12">
            <input class="btn btn-primary pull-right" name="submit" type="submit" value="Cadastrar"/>
            <a class="btn btn-info pull-left" href="<?= ROOT_URL ?>ponto/justificativa-lista">Voltar</a>
        </div>
    </div>

</form>
