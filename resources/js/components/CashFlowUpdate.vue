<template>
    <div id='cash-main-div'>
        <h2>this is the main page</h2>
        <div class="flex-row">
            <selectbox
                id="client-name-dropdown"
                placeholder="Client Name"
                :values=testValues
            >
            </selectbox>
            <selectbox
                id="investment-type-dropdown"
                placeholder="Investment Type"
                :values=testValues
            >
            </selectbox>
            <selectbox
                id="client-name-dropdown"
                placeholder="Investment Name"
                :values=testValues
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
                testValues: ['here', 'we']
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
