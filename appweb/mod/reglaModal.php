<div class="modal fade" id="modalregla" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="card">
                <div class="card-header">
                    Añadir seguimiento de <strong>monitorizacion</strong>
                </div>
                <form action="hashtag.php" method="post" class="form-horizontal">
                <div class="card-body card-block">
                        <div class="row form-group">
                            
                            <div class="col col-md-3">
                            <select name="selectregla" id="selectregla" class="form-control">
                                                        <option value="1">Hashtag</option>
                                                        <option value="3">Usuario</option>
                                                    </select>
                                                </div>
                                                
                            
                            <div class="col-12 col-md-9">
                                <input type="text" id="varregla" name="varregla" placeholder="Hashtag o usuario a monitorizar..." class="form-control">
                                <p class="help-block" style="font-size: 12px;">Introduce hashtag o usuario a monitorizar sin añadir <b>#</b> ni <b>@</b></p>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name='agregarnuevaregla' class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Monitorizar
                    </button>
                    </form>
                    <button  type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Cancelar
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    </div>
</div>