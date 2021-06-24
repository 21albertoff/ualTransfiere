<div class="table-data__tool-left">

    <!-- Filtro de clasificacion -->
    <form method="post" action="jerarquiah.php">
        <div class="rs-select2--light rs-select2--sm" style="width: 200px;">
            <select class="js-select2" name="infojh">
                <?php
                    if ($info != 0){
                        echo "<option value='0'>Hashtags Padres</option>";
                    }else{
                        echo "<option value='0' selected>Hashtags Padres</option>";
                    }
                    if ($info != 1){
                    echo "<option value='1'>Hashtags Hijos</option>";
                    }else{
                    echo "<option value='1' selected>Hashtags Hijos</option>";
                    }
                    
                    if ($info != 2){
                    echo "<option value='2'>Hashtags Hermanos</option>";
                    }else{
                    echo "<option value='2' selected>Hashtags Hermanos</option>";
                    }
                ?>
            </select>     
            <div class="dropDownSelect2"></div>
        </div>
        <input type="hidden" name="nombreH" value="<?php echo $nombreH ?>">
        <input type="hidden" name="idHashtag" value="<?php echo $idh ?>">
        <button type="submit" name='informacion' class="au-btn au-btn-icon au-btn--blue au-btn--small">
            <i class="fa fa-filter"></i> Ver
        </button>
    </form>

</div>