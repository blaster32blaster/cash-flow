<template>
    <span>
        {{ getValue(entry) }}
    </span>
</template>
<script>
    export default {
        name: 'value',
        components: {
        },
        props: {
            entry: {
                // type: Array,
                // default: () => []
            },
            arraykey: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
            }
        },
        methods: {
            getValue: function (item) {
                if (this.arraykey !== '') {
                    let key = this.arraykey;
                    return item[key]
                }
                return item
            }
        },
        mounted() {
        },
    }
</script>
<style scoped>
    #cash-main-div {
        display: flex;
        flex-direction: column;
    }
</style>
