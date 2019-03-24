<template>
    <div class="row justify-content-center">

        <form-component 
        @new="addNota">
        
        </form-component>

        <nota-component v-for="(nota, index) in notas"
         :key="nota.id"
          :nota = "nota"
         @delete = "deleteNota(index)"
         @update = "updateNota(index, ...arguments)"
         >
         
        </nota-component>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                notas:[]
            }
        },

        mounted() {
            axios.get('/notas').then((response)=>{
                this.notas = response.data;
            })
        },

        methods: {
            addNota(nota){
                this.notas.push(nota);
            },

            updateNota(index, nota){
                this.notas[index] = nota;
            },

            deleteNota(index){
                this.notas.splice(index, 1);
            }
        }
    }
</script>
