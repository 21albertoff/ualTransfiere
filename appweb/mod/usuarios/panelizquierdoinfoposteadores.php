<div class="table-data__tool-left">
    <form method="post" action="infoposteadores.php">
        <div class="rs-select2--light rs-select2--sm" style="width: 144px;">
            <select class="js-select2" name="infoposteadores">
            <?php
                if ($info != 0){
                    echo "<option value='0'>Hashtags</option>";
                }else{
                    echo "<option value='0' selected>Hashtags</option>";
                }
                if ($info != 1){
                    echo "<option value='1'>Mencionados</option>";
                }else{
                    echo "<option value='1' selected>Mencionados</option>";
                }
                
                if ($info != 2){
                    echo "<option value='2'>Enlaces</option>";
                }else{
                    echo "<option value='2' selected>Enlaces</option>";
                }
            ?>
            </select>     
            <div class="dropDownSelect2"></div>
        </div>
        <input type="hidden" name="nombreP" value="<?php echo $nombreP ?>">
        <input type="hidden" name="verificado" value="<?php echo $verificado ?>">
        <input type="hidden" name="idP" value="<?php echo $IdP ?>">

        <button type="submit" name='informacionp' class="au-btn au-btn-icon au-btn--blue au-btn--small">
            <i class="fa fa-filter"></i> Ver
        </button>
        
    </form>
</div>