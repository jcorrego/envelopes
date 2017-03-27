<template>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card ">
                <div class="card-header">Categorías</div>
                <transition-group name="categorieslist" tag="ul" class="list-group list-group-flush" enter-active-class="animated flipInX"
                                  leave-active-class="animated flipOutX" appear>
                    <li :key="category.id" class="list-group-item justify-content-between" v-for="(category,index) in this.list">
                        <div class="row w-100">
                            <div class="col"><i :class="'fa fa-fw fa-'+category.icon" aria-hidden="true"></i> {{ category.name }}</div>
                            <div class="col">
                                <span class="badge badge-pill badge-info">{{ category.envelopes_count }}</span> sobre(s)
                            </div>
                            <div class="col text-right">
                                <a :href="'/categories/'+category.id + '/edit'" class="btn btn-sm btn-raised btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a class="btn btn-sm btn-raised btn-danger" @click="deleteCategory(index)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </li>
                </transition-group>
                <div class="card-footer">
                    <div class="form-group row">
                        <div class="col-9">
                            <input class="form-control" type="text" v-model="name" placeholder="Escribe el nombre de la categoría...">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-raised btn-primary btn-block" @click="addCategory">Agregar categoría</button>
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
        props: ['categories'],
        data(){
            return {
                name: '',
                list: this.categories
            }
        },
        methods: {
            addCategory(){
                if (this.name) {
                    axios.post('categories', {name: this.name}).then(
                        ({data}) => {
                            if (data.category) {
                                this.list.push(data.category);
                                this.name = '';
                            }
                        }
                    );
                }
            },
            deleteCategory(index){
                if (confirm('¿Estás seguro que quieres eliminar esta categoría?')) {
                    axios.delete('categories/' + this.categories[index].id).then(
                        ({data}) => {
                            if (data.status == 'success') this.categories.splice(index, 1);
                        }
                    );
                }
            }
        }
    }
</script>
