
        <h1 class="text-center mb-4">FORMULARIO PARA PRODUCTOS</h1>
        <div class="border shadow p-4">
            <form>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre del producto</label>
                        <input type="text" id="nombre" class="form-control" placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="col-md-4">
                        <label for="precio" class="form-label">Ingrese precio</label>
                        <input type="number" id="precio" name="precio" min="0" step="0.01" placeholder="0.00" id="precio" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="descripcion" class="form-label">Descripción del producto</label>
                        <input type="text" id="descripcion" class="form-control" placeholder="Ingrese la descripción">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <script src="<?= asset('./build/js/producto/index.js') ?>"></script>

