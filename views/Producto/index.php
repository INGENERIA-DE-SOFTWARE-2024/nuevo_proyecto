<h1 class="text-center mb-4">FORMULARIO PARA INGRESAR PRODUCTOS</h1>
<div class="row justify-content-center">
    <div class="border shadow p-4 col-lg-6 text-center">
        <form id="formProducto">
            <input type="hidden" name="pro_id" id="pro_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="pro_nombre" class="form-label">Nombre del Producto</label>
                    <input type="text" name="pro_nombre" id="pro_nombre" class="form-control" placeholder="Producto">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="pro_precio" class="form-label">Precio del Producto</label>
                    <input type="number" name="pro_precio" id="pro_precio" class="form-control" placeholder="Precio" step="0.01" min="0" />
                    </div>
            </div>
            <div class="row">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12 table-responsive">
        <h2 class="text-center mt-3">Listado de productos</h2>
        <table class="table table-bordered table-hover" id="tablaProducto">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/producto/index.js') ?>"></script>