<template>
    <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publicado en {{nota.created_at}} 
                    || <small>Ultima actualizacion {{nota.updated_at}}</small>
                </div>
                
                <div class="card-body">
                    <input v-if="editMode" type="text" class="form-control" v-model="nota.description">
                    <p  v-else> {{ nota.description }} </p>
                    <div class="panel-footer">
                        <button v-if="editMode" class="btn btn-default" v-on:click="onClickUpdate()" >Guardar cambios</button>
                        <button v-else class="btn btn-default" v-on:click="onClickEdit()" >Editar</button>
                        <button class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        props: ['nota'],
        data(){
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods : {
            onClickDelete(){
                axios.delete(`/notas/${this.nota.id}`).then(()=>{
                     this.$emit('delete');
                });
            },
            onClickEdit(){
                this.editMode = true
            },
            onClickUpdate(){
                const params = {
                    description : this.nota.description
                };
                axios.put(`/notas/${this.nota.id}`,params).then((response)=>{
                    this.editMode = false;
                    const nota = response.data;
                    this.$emit('update', nota);
                });
                
            }
        }
    }
</script>
