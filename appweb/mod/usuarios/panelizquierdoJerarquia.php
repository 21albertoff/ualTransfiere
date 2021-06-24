<div class="table-data__tool-left">

    <!-- Filtro de clasificacion -->
    <form method="post" action="jerarquiap.php">
        <div class="rs-select2--light rs-select2--sm" style="width: 200px;">
            <select class="js-select2" name="infojp">
                <?php
                    if ($info != 0){
                        echo "<option value='0'>Padres</option>";
                    }else{
                        echo "<option value='0' selected>Padres</option>";
                    }
                ?>
            </select>     
            <div class="dropDownSelect2"></div>
        </div>
        <input type="hidden" name="nombreP" value="<?php echo $nombreP ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $IdP ?>">
        <input type="hidden" name="verificado" value="<?php echo $verificado ?>">
        <input type="hidden" name="idUsuario" value="<?php echo $IdP ?>">
        <button type="submit" name='informacionp' class="au-btn au-btn-icon au-btn--blue au-btn--small">
            <i class="fa fa-filter"></i> Ver
        </button>
    </form>

</div>