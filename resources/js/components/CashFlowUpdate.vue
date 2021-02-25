<template>
    <div id='cash-main-div'>
        <h2>this is the main page</h2>
        <div class="flex-row">
            <selectbox
                :disable="false"
                id="client-name-dropdown"
                placeholder="Client Name"
                :values=clients
                arraykey="name"
                statekey="client"
                @clientselected="clientUpdated"
            >
            </selectbox>
            <selectbox
                :disable="disableSecondary"
                id="investment-type-dropdown"
                placeholder="Investment Type"
                :values=testValues
                arraykey="name"
                statekey="investmenttype"
            >
            </selectbox>
            <selectbox
                :disable="disableSecondary"
                id="client-name-dropdown"
                placeholder="Investment Name"
                :values=testValues
                arraykey="name"
                statekey="investmentname"
            >
            </selectbox>
        </div>
        <div class="flex-row">
            <div class="column" id="current-value-wrapper">
                <label
                    for="current-value-input"
                >
                    Current Value
                </label>
                <input
                    type="number"
                    min="0.01"
                    step="any"
                    id="current-value-input"
                    name="current-value-input"
                />
            </div>
            <div class="column" id="current-value-wrapper">
                <label
                    for="current-value-input"
                >
                    Updated Value
                </label>
                <input
                    type="number"
                    min="0.01"
                    step="any"
                    id="updated-value-input"
                    name="updated-value-input"
                />
            </div>
        </div>
        <div class="flex-row">
            <div class="column" id="date-wrapper">
                <label
                    for="date-input"
                >
                    Date
                </label>
                <input
                    type="number"
                    min="0.01"
                    step="any"
                    id="date-input"
                    name="date-input"
                />
            </div>
            <div class="column" id="value-wrapper">
                <label
                    for="value-input"
                >
                    Value
                </label>
                <input
                    type="number"
                    min="0.01"
                    step="any"
                    id="value-input"
                    name="value-input"
                />
            </div>
            <Button
                :classes="calculateClass"
                type="calculate"
                buttonid="calculate-button"
                buttonlabel="Calculate"
                @calculate="handleCalculate"
            >
            </Button>
        </div>
        <div class="flex-row">
            <Button
                :classes="cancelClass"
                type="cancel"
                buttonid="cancel-button"
                buttonlabel="Cancel"
                @cancel="handleCancel"
            >
            </Button>
            <Button
                :classes="submitClass"
                type="submit"
                buttonid="submit-button"
                buttonlabel="Submit"
                @submit="handleSubmit"
            >
            </Button>
        </div>
    </div>
</template>
<script>
    import selectbox from './Selectbox';
    import Button from './Button';
    import lib from '../library';
    export default {
        components: {
            selectbox,
            Button
        },
        props: {
        },
        data() {
            return {
                submitClass: 'submit-button',
                cancelClass: 'cancel-button',
                calculateClass: 'calculate-button',
                testValues: ['here', 'we'],
                clients: [],
                investmentTypes: [],
                investmentNames: [],
                disableSecondary: true,
            }
        },
        methods: {
            clientUpdated () {
                let client = this.$store.state.state.client
                if (client && Object.keys(client).length === 0 && client.constructor === Object) {
                    this.disableSecondary = true;
                }
                this.disableSecondary = false;
                this.updateSecondaryData();
            },
            updateSecondaryData () {
                lib.func.fetchInvestmentTypes(this.$store.state.state.client.id)
                .then(response => {
                    // console.log('here are the things')
                    // console.log(Array.keys(response.clients.name))
                    // console.log(Object.keys(response.clients.name))
                    this.investmentTypes = response.investmentTypes;
                    }
                )

                lib.func.fetchInvestmentNames(this.$store.state.state.client.id)
                .then(response => {
                    // console.log('here are the things')
                    // console.log(Array.keys(response.clients.name))
                    // console.log(Object.keys(response.clients.name))
                    this.investmentNames = response.investmentNames;
                    }
                )
            },
            handleCalculate () {

            },
            handleCancel () {

            },
            handleSubmit () {

            }
        },
        mounted() {
            lib.func.fetchClients()
                .then(response => {
                    // console.log('here are the things')
                    // console.log(Array.keys(response.clients.name))
                    // console.log(Object.keys(response.clients.name))
                    this.clients = response.clients;
                    }
                )
        },
        watch: {
            //  disableSecondary () {
            //     console.log('calling disable secondary')
            //     obj = this.$store.state.client
            //     return obj && Object.keys(obj).length === 0 && obj.constructor === Object
            //     // return !this.$store.state.client;
            // },
        }
    }
</script>
<style scoped>
    #cash-main-div {
        display: flex;
        flex-direction: column;
    }
    .column {
        display: flex;
        flex-direction: column;
    }
    .flex-row {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        margin-top: 1rem;
    }
</style>
