<template>
    <div id='dashboard-main-div'>
        <div id="cash-flow-update-wrapper" v-show="cashflowadding && !showDetails">
            <h2>Cash Flow Update</h2>
            <cashflow>
            </cashflow>
            <div>
                <Button
                    :classes="buttonClass"
                    type="viewswitch"
                    buttonid="switch-client-button"
                    buttonlabel="Switch to Client View"
                    @viewswitch="handleSwitch"
                >
                </Button>
            </div>
        </div>
        <div id="client-list-wrapper" v-show="!cashflowadding">
            <h2>Clients</h2>
            <div
                v-for="item in clients"
                :value="item.name"
                :key="item.id"
                id="clients-wrapper"
            >
                <Client
                    :client="item"
                    @clientdetails="handleShowClientDetails"
                    @cancelclientdetails="handleCancelClientDetails"
                    v-show="!showDetails || showDetails && selectedClient === item.id"
                >
                </Client>
            </div>
            <div v-show="!showDetails">
                <Button
                    :classes="buttonClass"
                    type="viewswitch"
                    buttonid="switch-cash-flow-button"
                    buttonlabel="Switch to Updating Cash Flow"
                    @viewswitch="handleSwitch"
                >
                </Button>
            </div>
        </div>
    </div>
</template>
<script>
    import Button from './Button.vue';
    import cashflow from './CashFlowUpdate';
    import Client from './Client';
    import lib from '../library';
    export default {
        components: {
            cashflow,
            Client,
            Button
        },
        props:
        {},
        data() {
            return {
                testValues: ['here', 'we'],
                clients: [],
                cashflowadding: false,
                buttonClass: 'switch-button',
                showDetails: false,
                selectedClient: ''
            }
        },
        methods: {
            /**
             * handle switch to adding cash flow
             */
            handleSwitch () {
                this.cashflowadding = !this.cashflowadding;
            },
            /**
             * handle switch to client details
             */
            handleShowClientDetails (client) {
                this.showDetails = true;
                this.selectedClient = client
            },
            /**
             * handle switching to stop showing details
             */
            handleCancelClientDetails (client) {
                this.showDetails = false;
                this.selectedClient = ''
            }
        },
        mounted() {
            lib.func.fetchClients()
                .then(response => {
                    this.clients = response.clients;
                    }
                )
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
    #cash-flow-update-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    #client-list-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>
