</select>
            </div>
            <div class="mb-3">
                <label for="id_venta" class="form-label">Venta</label>
                <select name="id_venta" id="id_venta" class="form-control">
                    @foreach($ventas as $venta)
                        <option value="{{ $venta->id }}">{{ $venta->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="cantidadDv" class="form-label">Cantidad</label>
                <input type="number" name="cantidadDv" id="cantidadDv" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="precioDv" class="form-label">Precio</label>
                <input type="number" step="0.01" name="precioDv" id="precioDv" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection