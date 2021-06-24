<div class="table-data__tool-left">

    <!-- Filtro de clasificacion -->
    <form method="post" action="hashtag.php">
    <div class="rs-select2--light rs-select2--sm">
        <select class="js-select2" name="filtro">
        <?php
            if ($filtro != 0){
                echo "<option value='0'>Total</option>";
            }else{
                echo "<option value='0' selected>Total</option>";
            }
            if ($filtro != 1){
                echo "<option value='1'>Hoy</option>";
            }else{
                echo "<option value='1' selected>Hoy</option>";
            }
            
            if ($filtro != 2){
                echo "<option value='2'>3 Días</option>";
            }else{
                echo "<option value='2' selected>3 Días</option>";
            }
            
            if ($filtro != 3){
                echo "<option value='3'>1 Semana</option>";
            }else{
                echo "<option value='3' selected>1 Semana</option>";
            }
            ?>
            </select>
        <div class="dropDownSelect2"></div>
    </div>
    <button type="submit" name='filtrar' class="au-btn au-btn-icon au-btn--blue au-btn--small"><i class="fa fa-filter"></i> Filtrar</button>
    <?php contadorHashtags($filtro) ?>
    </form>
</div>