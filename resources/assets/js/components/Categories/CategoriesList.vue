<template>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorías</div>

                    <div class="panel-body">
                        <div v-for="category in this.list">{{ category.name }}</div>
                    </div>
                    <div class="panel-footer">
                        Agregar categoría
                        <input type="text" v-model="name">
                        <button class="btn btn-raised btn-primary" @click="addCategory">Agregar</button>
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
        props : ['categories'],
        data(){
            return {
                name : '',
                list: this.categories
            }
        },
        methods :{
            addCategory(){
                if(this.name){
                    axios.post('categories',{name:this.name}).then(
                        ({data}) => {
                            if(data.category){
                                this.list.push(data.category);
                                this.name = '';
                            }
                        }
                    );
                }
            }
        }
    }
</script>
