<template>
    <div id='dashboard-main-div'>
        <div id="cash-flow-update-wrapper" v-show="cashflowadding">
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
                :key="item.name"
                id="clients-wrapper"
            >
                <Client
                    :client="item"
                >
                </Client>
            </div>
            <div>
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
                buttonClass: 'switch-button'
            }
        },
        methods: {
            fetchClients () {
                axios.get('/api/clients')
                    .then(response => {
                        this.clients = response.data
                    })
                    .catch(error => {
                        console.log('fetching clients error')
                    });
            },
            handleSwitch () {
                this.cashflowadding = !this.cashflowadding;
            }
        },
        mounted() {
            this.fetchClients();
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
