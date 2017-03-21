<template>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sobres</div>

                    <div class="panel-body">
                        <div v-for="envelope in this.list">{{ envelope.name }}</div>
                    </div>
                    <div class="panel-footer">
                        Agregar Sobre
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
        props : ['envelopes'],
        data(){
            return {
                name : '',
                list: this.envelopes
            }
        },
        methods :{
            addCategory(){
                if(this.name){
                    axios.post('envelopes',{name:this.name}).then(
                        ({data}) => {
                            if(data.envelope){
                                this.list.push(data.envelope);
                                this.name = '';
                            }
                        }
                    );
                }
            }
        }
    }
</script>
