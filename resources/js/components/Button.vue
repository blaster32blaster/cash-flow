<template>
    <div :id=buttonid>
        <button
            type="button"
            :class="classes"
            @click="handleClick()"
        >
            {{ buttonlabel }}
        </button>
    </div>
</template>
<script>
    export default {
        name: 'button',
        components: {
        },
        props: {
            buttonid : {
                type: String,
                default: ''
            },
            buttonlabel: {
                type: String,
                default: ''
            },
            classes: {
                type: String,
                default: ''
            },
            type: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
            }
        },
        methods: {
            handleClick () {
                this.$emit(this.type, this.buttonid);
            }
        },
        mounted() {
        }
    }
</script>
<style scoped>
    .switch-button{
        margin: 2rem;
        padding: 1rem;
        color:white;
        background-color: cornflowerblue;
    }
    .switch-button:hover{
        background-color: rgb(81, 136, 240);
    }
    .calculate-button {
        margin: 1rem;
        padding: 1rem;
        color:white;
        background-color: cornflowerblue;
    }
    .submit-button {
        margin: 1rem;
        padding: 1rem;
        color:white;
        background-color: rgb(14, 73, 14);
    }
    .cancel-button {
        margin: 1rem;
        padding: 1rem;
        color:white;
        background-color: rgb(126, 33, 53);
    }
    .cancel-button:hover {
        background-color: rgb(80, 23, 35);
    }
    .submit-button:hover {
        background-color: rgb(12, 46, 12);
    }
    .calculate-button:hover {
        background-color: rgb(81, 136, 240);
    }
</style>
