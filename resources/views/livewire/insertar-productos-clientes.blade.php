<div>
<h1>Insertar productos</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col" wire:ignore>
            {{-- <label for="modelo">Modelo :</label> --}}
            <select wire:model="selectedModelo" name="modelo" id="modelo" class="select2">
            <option value="">-- Modelo --</option>        
            @foreach ($modelos as $modelo) --}}
                    <option value="{{$modelo->producto_id}}">{{$modelo->producto_id}}-{{$modelo->modelo}}-{{$modelo->color}}-{{$modelo->talla}}</option>
                 </option>

            @endforeach
            
            </select>
            
        </div>
        
            <div class="col">
                <label for="cantidad">Cantidad :</label>
                <x-jet-input wire:model="cantidad" class="form-control"></x-jet-input>
            </div>
            <div class="col">
                <label for="precio">Precio :</label>
                <x-jet-input wire:model="precio" class="form-control"></x-jet-input>
            </div>
            <div class="col">
                <label for="subtotal">Total :</label>
                <x-jet-input wire:model="subtotal" class="form-control"></x-jet-input>
            </div>
            <div class="col">
                <x-jet-button class="btn btn-primary" wire:click="insertarLinea">Añadir</x-jet-button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load',function(){
    $('.select2'.select2());
    $('.select2').on('change',function(){
        @this.set = ('selectedModelo',this.value);
    }
    })
</script>
// {{-- <script>
//     document.addEventListener('livewire:load',function(){
//         $('#modelo').select2();
//         $('#modelo').on('change'),function(){
//             alert(this.value)
//             @this.set('selectedModelo',this.value)

//         }
//     });
// </script> --}}
</div>
