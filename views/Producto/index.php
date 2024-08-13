<h1 class="text-center mb-4">FORMULARIO PARA PRODUCTOS</h1>
<div class="row justify-content-center">
    <div class="border shadow p-4 col-lg-6 text-center">
        <form id="formProducto">
            <div class="row mb-3">
                <div class="col">
                    <label for="pro_nombre" class="form-label">Nombre del producto</label>
                    <input type="text" name="pro_nombre" id="pro_nombre" class="form-control" placeholder="Ingrese el nombre del producto">
                </div>
                <div class="col">
                    <label for="pro_precio" class="form-label">Ingrese precio</label>
                    <input type="number" name="pro_precio" id="pro_precio" min="0" step="0.01" placeholder="0.00" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12 table-responsive">
        <h2 class="text-center mt-3">Listado de productos</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Producto</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($producto) > 0) : ?>
                    <?php foreach ($producto as $key => $produ) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <input type="hidden" name="pro_id" value="<?= $key + 1 ?>">
                            <td><?= $produ->pro_nombre ?></td> 
                            <td><?= $produ->pro_precio ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No hay productos registrados</td>
                    </tr>
                <?php endif ?>
            </tbody>

        </table>
    </div>
</div>

<script src="<?= asset('./build/js/producto/index.js') ?>"></script>