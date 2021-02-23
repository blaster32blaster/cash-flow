<template>
    <div id='client-main-div'>
        {{ client.name }}
    </div>
</template>
<script>
    import cashflow from './CashFlowUpdate';
    export default {
        components: {
            cashflow
        },
        props: {
            client: {
                type: Object,
                default: () => {}
            }
        },
        data() {
            return {
            }
        },
        methods: {
        },
        mounted() {
        }
    }
</script>
<style scoped>
    #dashboard-main-div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>
