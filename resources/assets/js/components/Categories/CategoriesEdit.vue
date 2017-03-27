<template>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card ">
                <div class="card-header">Editar Categoría: {{ cat.name }}</div>
                <div class="card-block">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name"  v-model="cat.name" aria-describedby="nameHelp" placeholder="Escribe un nombre...">
                        <small id="nameHelp" class="form-text text-muted">El nombre con que se mostrará esta categoría en la aplicación</small>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icono</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" class="form-control" id="icon"  v-model="cat.icon" aria-describedby="nameHelp" placeholder="Nombre de un icono...">
                            <div class="input-group-addon"><i :class="'fa fa-'+cat.icon" aria-hidden="true"></i></div>
                        </div>
                        <small id="iconHelp" class="form-text text-muted">Escoje un ícono para este sobre. Puedes buscar en <a target="_blank" href="http://fontawesome.io/icons/">Font Awesome</a></small>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" @click="save" class="btn btn-raised btn-success">Guardar</a>
                    <a href="/categories" class="btn btn-raised btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['category'],
        data(){
            return {
                cat: this.category
            }
        },
        methods: {
            save(){
                axios.put('/categories/' + this.cat.id, this.cat).then(
                    ({data}) => {
                        if (data.status == 'success') {
                            if (data.message) $.snackbar({content: data.message, style: data.status});
                            document.location.href = '/categories';
                        }
                    }
                ).catch(function (error) {
                });
            },
            deleteCategory(){
                if (confirm('¿Estás seguro que quieres eliminar esta categoría?')) {
                    axios.delete('categories/' + this.cat.id).then(
                        ({data}) => {
                            if (data.status == 'success') document.location.href = '/categories';
                        }
                    );
                }
            }
        }
    }
</script>
