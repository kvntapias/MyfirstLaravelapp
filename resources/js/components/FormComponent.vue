<template>
    <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Titulo del app</div>
                    <div class="card-body">
                        <form action="" v-on:submit.prevent="nuevaNota()">
                            <div class="form-group">
                            <label for="nota">Ingresa tu nota</label>
                                <input type="text" name="nota" id="" class="form-control" v-model="description">
                            </div>
                            <button class="btn btn-primary" type="submit">Enviar Nota</button>
                        </form>
                    </div>
                </div>
        </div>
</template>

<script>
    export default {
        data(){
            return{
                description : ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            nuevaNota(){
                const params = {
                    description : this.description
                };
                this.description = ''
                axios.post('notas', params)
                    .then((response)=> {
                        const nota = response.data;
                         this.$emit('new', nota);                        
                    });
            }
        }
    }
</script>
