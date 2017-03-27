<template>
    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
        <label v-if="label">{{ label }}</label>
        <div class="input-group-addon">COP$</div>
        <input :disabled="disabled" ref="input" v-bind:value="value" v-on:input="updateValue($event.target.value)" v-on:focus="selectAll" v-on:blur="formatValue" class="form-control">
    </div>
</template>

<script>
    export default {
        mounted: function () {
            this.formatValue()
        },
        props: {
            value: {
                default: 0
            },
            label: {
                type: String,
                default: ''
            },
            disabled:{
                type: Boolean,
                default: false
            }
        },
        methods: {
            updateValue: function (value) {
                var result = currencyValidator.parse(value, this.value)
                if (result.warning) {
                    this.$refs.input.value = result.value
                }
                this.$emit('input', result.value)
            },
            formatValue: function () {
                this.$refs.input.value = currencyValidator.format(this.value)
            },
            selectAll: function (event) {
                // Workaround for Safari bug
                // http://stackoverflow.com/questions/1269722/selecting-text-on-focus-using-jquery-not-working-in-safari-and-chrome
                setTimeout(function () {
                    event.target.select()
                }, 0)
            }
        }
    }
</script>
