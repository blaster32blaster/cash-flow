<template>
    <div :id=id>
        <select
            v-model="selected"
        >
            <option :value="null" disabled>{{ placeholder }}</option>
            <option v-for="item in values"
                :value="item"
                :key="item"
             >
                {{item}}
            </option>
        </select>
    </div>
</template>
<script>
    export default {
        name: 'select-box',
        components: {
        },
        props: {
            id : {
                type: String,
                default: ''
            },
            placeholder: {
                type: String,
                default: ''
            },
            values: {
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                selected: null,
            }
        },
        methods: {
        },
        mounted() {
        }
    }
</script>
<style scoped>
    #cash-main-div {
        display: flex;
        flex-direction: column;
    }
</style>
