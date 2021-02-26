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
                :values=investmentTypes
                arraykey="type"
                statekey="investmenttype"
                @investmenttypeselected="typeUpdated"
            >
            </selectbox>
            <selectbox
                :disable="disableSecondary"
                id="client-name-dropdown"
                placeholder="Investment Name"
                :values=investmentNames
                arraykey="name"
                statekey="investmentname"
                @investmentnameselected="nameUpdated"
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
                    disabled
                    type="text"
                    min="0.01"
                    step="any"
                    id="current-value-input"
                    name="current-value-input"
                    :value="currentValue"
                />
            </div>
            <div class="column" id="current-value-wrapper">
                <label
                    for="current-value-input"
                >
                    Updated Value
                </label>
                <input
                    disabled
                    type="text"
                    min="0.01"
                    step="any"
                    id="updated-value-input"
                    name="updated-value-input"
                    v-model="updatedCalculatedValue"
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
                    :disabled="!isCashFlowSet"
                    type="date"
                    id="date-input"
                    name="date-input"
                    v-model="updatedDate"
                />
            </div>
            <div class="column" id="value-wrapper">
                <label
                    for="value-input"
                >
                    Value
                </label>
                <input
                    :disabled="!isCashFlowSet"
                    type="number"
                    min="0.01"
                    step="any"
                    id="value-input"
                    name="value-input"
                     v-model="updatedValue"
                />
            </div>
            <Button
                :disabled="!isCashFlowSet"
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
                :disabled="!isCashFlowSet"
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
                clients: [],
                investmentTypes: [],
                investmentNames: [],
                cashFlow: {},
                disableSecondary: true,
                currentValue: null,
                updatedDate: null,
                updatedValue: null,
                isCashFlowSet: false,
                updatedCalculatedValue: null,
            }
        },
        methods: {
            /**
             * client was updated
             */
            clientUpdated () {
                let client = this.$store.state.state.client
                if (client && Object.keys(client).length === 0 && client.constructor === Object) {
                    this.disableSecondary = true;
                }
                this.disableSecondary = false;
                this.updateSecondaryData();
            },
            /**
             * update investment types and names
             */
            updateSecondaryData () {
                lib.func.fetchInvestmentTypes(this.$store.state.state.client.id, false)
                .then(response => {
                    this.investmentTypes = response.investmentTypes;
                    }
                )

                lib.func.fetchInvestmentNames(this.$store.state.state.client.id)
                .then(response => {
                    this.investmentNames = response.investmentNames;
                    }
                )
            },
            /**
             * type was updated
             */
            typeUpdated () {
                console.log('type updates');
            },
            /**
             * name was updated
             */
            nameUpdated () {
                let invst = this.$store.state.state.investmentname

                if (invst && Object.keys(invst).length !== 0 && invst.constructor === Object) {
                    lib.func.fetchCashFlow(this.$store.state.state.investmentname.id)
                        .then(response => {
                            this.cashFlow = response.cashFlow;
                            this.handCalcCurrentValue();
                            this.isCashFlowSet = true;
                            }
                        )
                }
            },
            /**
             * handle calc button click
             */
            handleCalculate () {
                let amount = this.$store.state.state.investmentname.amount;
                let percentage = this.updatedValue;
                let value = amount * (1 + (percentage/100));

                var formatter = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                });
                this.updatedCalculatedValue = formatter.format(value);

            },
            /**
             * handle cancel button click
             */
            handleCancel () {
                this.updateGlobalState('client', null);
                this.updateGlobalState('investmentname', null);
                this.updateGlobalState('investmenttype', null);
                this.cashFlow = {};
                this.investmentNames = [];
                this.investmentTypes = [];
                this.isCashFlowSet = false;
                this.updatedCalculatedValue = null;
                this.updatedDate = null;
                this.updatedValue = null;
                this.currentValue = null;
            },
            /**
             * handle submit button click
             */
            handleSubmit () {
                lib.func.updateCashFlow(this.cashFlow.id, this.updatedValue)
            },
            /**
             * calculate the current value
             */
            handCalcCurrentValue () {
                let amount = this.$store.state.state.investmentname.amount;
                let percentage = this.cashFlow.return;
                let value = amount * (1 + (percentage/100));

                var formatter = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                });
                this.currentValue = formatter.format(value);
            },
            /**
             * update the global state
             */
            updateGlobalState (key, value) {
                this.$store.commit({
                    type: 'state/update',
                    item: key,
                    value: value
                })
            },
        },
        mounted() {
            lib.func.fetchClients()
                .then(response => {
                    this.clients = response.clients;
                    }
                )
        },
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
