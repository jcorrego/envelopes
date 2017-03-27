<template>
    <div class="row w-100">
        <div class="col-md-5 text-right"><i :class="'fa fa-fw fa-'+envelope.icon" aria-hidden="true"></i> {{ envelope.name }}</div>
        <div class="col-md-5">
            <currency-input :ref="'currency'" v-model="value"></currency-input>
        </div>
        <div class="col">
            <button v-if="value != saved" class="btn btn-raised btn-success" @click="save">Guardar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['envelope', 'month', 'initial'],
        data(){
            return {
                saved: this.initial,
                value: this.initial,
            }
        },
        methods: {
            save(){
                axios.post('/budgets/' + this.envelope.id + '/' + this.month + '/setvalue', {value: this.value}).then(
                    ({data}) => {
                        if (data.status == 'success') {
                            this.saved = this.value;
                            if (data.message) $.snackbar({content: data.message, style: data.status});
                        }
                    }
                ).catch(function (error) {
                });
            }
        },
        watch: {
            // whenever question changes, this function will run
            value: function (newValue) {
                this.$emit('valuechange',newValue)
            }
        }
    }
</script>
