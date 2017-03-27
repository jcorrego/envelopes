<template>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card ">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item" v-for="m in months">
                            <a class="nav-link" :class="{ active: m==month }" :href="'/budgets?month='+m">{{ toMonth(m) }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <h4 class="card-title">Presupuestos</h4>
                    <p class="card-text">Puedes crear presupuestos para cada mes, usando los sobre y categorías actuales del sistema.</p>
                </div>
                <ul class="list-group list-group-flush" v-for="category in categories">
                    <li class="list-group-header" >
                        <div class="row">
                            <div class="col">
                                <span class="badge badge-pill badge-info">Categoría</span>
                                <i :class="'fa fa-fw fa-'+category.icon" aria-hidden="true"></i>
                                {{ category.name }}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item" v-for="envelope in category.envelopes">
                        <budgets-edit v-on:valuechange="calculateTotal" :ref="'e'+envelope.id" :envelope="envelope" :month="month" :initial="budgetValue(envelope.id)"></budgets-edit>
                    </li>
                </ul>
                <div class="card-footer">
                    <div class="row w-100">
                        <div class="col-md-5"></div>
                        <div class="col-md-5"><currency-input ref='currencyTotal' v-model="total" :disabled="true"></currency-input></div>
                        <div class="col"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
            this.calculateTotal();
        },
        props: ['budgets', 'month', 'months', 'categories'],
        data(){
            return {
                total: 0
            }
        },
        methods: {
            budgetValue(env_id){
                var result = 0;
                _.forEach(this.budgets, function (val, key) {
                    if(key == env_id) {
                        result = val;
                    }
                });
                return result;
            },
            toMonth(m){
                return _.truncate(m,{length:7,omission:''});
            },
            calculateTotal(){
                var tot = 0;
                _.forEach(this.$refs, function(val,key){
                    if(_.startsWith(key,'e')) tot += val[0].value
                });
                this.total = currencyValidator.format(tot);
            }
        }
    }
</script>
