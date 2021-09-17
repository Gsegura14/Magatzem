<div>
    <select name="tallas[]" id="" class="selectTallas select2" multiple = 'multiple' wire:model="selectedTallas">
        <option value="">-- Selecciona las tallas --</option>
        @foreach ($tallas as $talla)
        <option value="{{$talla->id}}">{{$talla->talla}}</option>
            
        @endforeach
    </select>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
    <script>
        document.ready(function(){
        $('.selectTallas'.select2());
        $('.selectTallas').on('change',function(){
            @this.set = ('selectedTallas',this.value);
        }
        })
    </script>
</div>
