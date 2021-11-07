<div>
    <div class="card">
        <div class="card-body">
            <div>
                <div class="row">
                        <div class="form-group col-lg-3 col-md-12 col-sm-12 mt-2" wire:ignore>
                            <label for="selModo">Aplicar:</label>
                            <x-adminlte-select class="select2" wire:model="selModo" name="selModo">
                                <option value="">-- Acción --</option>
                                <option value=1>Descuento %</option>
                                <option value=2>Precio</option>
                                <option value="3">Asignar % Stock</option>
                                <option value="4">Aumentar % Stock</option>
                                <option value="5">Aumentar cantidad Stock</option>
                            </x-adminlte-select>
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="modelo" id="modelo" placeholder="Modelo"
                            wire:model="modelo">
                    </div>

                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="color" id="color" placeholder="Color"
                            wire:model="color">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="talla" id="talla" placeholder="Talla"
                            wire:model="talla">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <input type="text" class="form-control" name="valor" id="valor" placeholder="Valor"
                            wire:model="valor">
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 mt-2">
                        <x-adminlte-button label="Aplicar" theme="primary" class="btn btn-block" id="btnAplicar"
                            wire:click="realizarAccion" />
                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                $('.select2').select2();
                $('.select2').on('change', function() {
                    @this.set('selModo', this.value);

                });

            });
        </script>









        {{-- <script>
            document.addEventListener('livewire:load', function() {
                $('#btnAplicar').on('click', function() {
                    var modelo = $('#talla').val();

                    if (modelo == "") {
                        Swal.fire({
                            title: 'Do you want to save the changes?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Save',
                            denyButtonText: `Don't save`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        })

                    }

                });
            })
        </script> --}}

        {{-- <script>
            document.addEventListener('livewire:load', function() {
                $('#btnAplicar').on('click', function() {
                   
                    var modelo = $('#modelo').val();
                    var color = $('#color').val();
                    var talla = $('#talla').var();

                    if(modelo == ""){
                        alert('hola');
                        Swal.fire({
                            title: 'Do you want to save the changes?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Save',
                            denyButtonText: `Don't save`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        })
                    }
                });
            })
        </script> --}}

    @endpush
</div>
