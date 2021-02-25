<template>
    <div class="client-wrapper">
        <div
            :id="client.id + '-client-main-show-div'"
            class="main-client-show-div"
            @click="showClientDetails"
            v-show="!showDetail"
        >
            {{ client.name }}
        </div>
        <div
            :id="client.id + '-client-main-detail-div'"
            class="main-client-detail-div"
            v-show="showDetail"
        >
            {{ client.name}}
            <button
                type="button"
                class="cancel-detail-button"
                @click="handleCancelDetails()"
            >
                Cancel Detail View
            </button>
        </div>
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
                showDetail: false,
                buttonClass: 'cancel-button',
            }
        },
        methods: {
            showClientDetails () {
                this.showDetail = true;
                this.$emit('clientdetails', this.client.id);
            },
            handleCancelDetails () {
                this.showDetail = false;
                this.$emit('cancelclientdetails', this.client.id);
            }
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
    .main-client-show-div:hover {
        cursor:pointer;
    }
    .main-client-detail-div {
        display: flex;
        flex-direction: column;
    }
    .cancel-detail-button {
        margin: 1rem;
        padding: 1rem;
        color:white;
        background-color: rgb(126, 33, 53);
    }
</style>
