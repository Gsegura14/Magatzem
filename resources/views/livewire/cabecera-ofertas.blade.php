<div>
    <div class="row">
        <div class="col-8">
            <h1>Crear oferta</h1>
        </div>
        <div class="col-4">
            <a href="{{ Route('campania.create', $ofertaId) }}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="success" if="crearCampania"
                    label="Crear Campaña" />
            </a>
            <a href="{{ Route('stockOferta.excel', $ofertaId) }}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="success" id="btnExcel"
                    icon="fa fa-share-square" />
            </a>
            <a href="{{ Route('revision.stockOferta.excel', $ofertaId) }}">
                <x-adminlte-button class="float-right mr-2 mt-2" theme="success" id="btnImportExcel"
                    icon="fa fa-download" />
            </a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label for="cliente">Cliente:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="cliente" readonly wire:model="cliente"
                        id="cliente"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Fecha de inicio</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="fecha" readonly wire:model="fecha"
                        id="fecha"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Unidades:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="unidades" readonly wire:model="unidades"
                        id="unidades"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Modelos:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="modelos" readonly wire:model="modelos"
                        id="modelos"></x-adminlte-input>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <x-jet-label>Nºreferencias:</x-jet-label>
                    <x-adminlte-input class="w-full" type="text" name="referencias" readonly
                        wire:model="referencias" id="referencias"></x-adminlte-input>
                </div>
            </div>
        </div>
    </div>

</div>
