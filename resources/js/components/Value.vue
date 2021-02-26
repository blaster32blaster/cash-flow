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
            },
            arraykey: {
                type: String,
                default: ''
            }
        },
        methods: {
            /**
             * get the item value
             */
            getValue: function (item) {
                if (this.arraykey !== '') {
                    let key = this.arraykey;
                    return item[key]
                }
                return item
            }
        },
    }
</script>
<style scoped>
    #cash-main-div {
        display: flex;
        flex-direction: column;
    }
</style>
