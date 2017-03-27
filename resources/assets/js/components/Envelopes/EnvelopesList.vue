<template>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card ">
                <div class="card-header">Sobres</div>
                <transition-group name="envelopeslist" tag="ul" class="list-group list-group-flush" enter-active-class="animated flipInX"
                                  leave-active-class="animated flipOutX" appear>
                    <li :key="envelope.id" class="list-group-item" v-for="(envelope,index) in this.list">
                        <div class="row w-100">
                            <div class="col"><i :class="'fa fa-fw fa-'+envelope.icon" aria-hidden="true"></i> {{ envelope.name }}</div>
                            <div class="col"><span class="badge badge-pill badge-info">Categoría</span> <i :class="'fa fa-fw fa-'+envelope.category.icon" aria-hidden="true"></i> {{ envelope.category.name }}</div>
                            <div class="col text-right">
                                <a :href="'/envelopes/'+envelope.id + '/edit'" class="btn btn-sm btn-raised btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="#" class="btn btn-sm btn-raised btn-danger" @click="deleteEnvelope(index)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </li>
                </transition-group>
                <div class="card-footer">
                    <div class="form-group row">
                        <el-select class="col-3" v-model="category" placeholder="Categoría...">
                            <el-option v-for="cat in categories" :label="cat.name" :value="cat.id"></el-option>
                        </el-select>
                        <div class="col-6">
                            <input class="form-control" type="text" v-model="name" placeholder="Escribe el nombre del sobre...">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-raised btn-primary btn-block" @click="addEnvelope">Agregar sobre</button>
                        </div>
                    </div>
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
        props: ['envelopes', 'categories'],
        data(){
            return {
                name: '',
                list: this.envelopes,
                category: null
            }
        },
        methods: {
            addEnvelope(){
                if (this.name) {
                    axios.post('envelopes', {name: this.name, 'category_id': this.category}).then(
                        ({data}) => {
                            if (data.envelope) {
                                this.list.push(data.envelope);
                                this.name = '';
                            }
                        }
                    ).catch(function (error) {
                        if (error.response) {
                            if (error.response.status == 422) {
                                var data = error.response.data;
                                _.forEach(data, function (error, key) {
                                    $.snackbar({content: error, style: 'danger'});
                                });
//                                data.forEach(error => {

//                                })
                            } else {
                                console.log(error.response.status);
                            }

                        } else {
                            console.log('Error', error.message);
                        }
                    });
                }
            },
            deleteEnvelope(index){
                if(confirm('¿Estás seguro que quieres eliminar este sobre?')){
                    axios.delete('envelopes/' + this.envelopes[index].id).then(
                        ({data}) => {
                            if (data.status == 'success') this.envelopes.splice(index, 1);
                        }
                    );
                }
            }
        }
    }
</script>
