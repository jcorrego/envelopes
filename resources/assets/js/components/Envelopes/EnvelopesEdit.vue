<template>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card ">
                <div class="card-header">Editar Sobre: {{ env.name }}</div>
                <div class="card-block">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name"  v-model="env.name" aria-describedby="nameHelp" placeholder="Escribe un nombre...">
                        <small id="nameHelp" class="form-text text-muted">El nombre con que se mostrará este sobre en la aplicación</small>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <el-select v-model="env.category_id" placeholder="Categoría...">
                            <el-option v-for="cat in categories" :label="cat.name" :value="cat.id"></el-option>
                        </el-select>
                        <small id="categoryIdHelp" class="form-text text-muted">Categoría para agrupar los sobres</small>
                    </div>
                    <div class="form-group">
                        <label for="icon">Icono</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" class="form-control" id="icon"  v-model="env.icon" aria-describedby="nameHelp" placeholder="Nombre de un icono...">
                            <div class="input-group-addon"><i :class="'fa fa-'+env.icon" aria-hidden="true"></i></div>
                        </div>
                        <small id="iconHelp" class="form-text text-muted">Escoje un ícono para este sobre. Puedes buscar en <a target="_blank" href="http://fontawesome.io/icons/">Font Awesome</a></small>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" @click="save" class="btn btn-raised btn-success">Guardar</a>
                    <a href="/envelopes" class="btn btn-raised btn-danger">Cancelar</a>
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
        props: ['envelope', 'categories'],
        data(){
            return {
                env: this.envelope
            }
        },
        methods: {
            save(){
                axios.put('/envelopes/' + this.env.id, this.env).then(
                    ({data}) => {
                        if (data.status == 'success') {
                            if (data.message) $.snackbar({content: data.message, style: data.status});
                            document.location.href = '/envelopes';
                        }
                    }
                ).catch(function (error) {
                });
            },
            deleteEnvelope(){
                if (confirm('¿Estás seguro que quieres eliminar este sobre?')) {
                    axios.delete('envelopes/' + this.env.id).then(
                        ({data}) => {
                            if (data.status == 'success') document.location.href = '/envelopes';
                        }
                    );
                }
            }
        }
    }
</script>
