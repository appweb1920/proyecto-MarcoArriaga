<!--Modal para eliminar producto-->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Eliminar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/inventario" id="deleteForm" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="modal-body mx-3 justify-content-center  text-center">
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="prodElim text-center" type="text" id="nombrePE" name="nombrePE" value="" readonly>
                    <p>¿Estás seguro de querer eliminar este producto?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="elimina" class="btn btn-default" >Si, eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal para eliminar categoria-->
<div class="modal fade" id="modalDeleteCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Eliminar categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/categoria" id="deleteFormCat" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="modal-body mx-3 justify-content-center  text-center">
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="prodElim text-center" type="text" id="nombreCE" name="nombreCE" value="" readonly>
                    <p>¿Estás seguro de querer eliminar esta categoria?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="elimina" class="btn btn-default" >Si, eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Modal para eliminar marca-->
<div class="modal fade" id="modalDeleteMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Eliminar marca</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/marca" id="deleteFormMarca" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="modal-body mx-3 justify-content-center  text-center">
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="prodElim text-center" type="text" id="nombreME" name="nombreME" value="" readonly>
                    <p>¿Estás seguro de querer eliminar esta marca?</p>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="elimina" class="btn btn-default" >Si, eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>