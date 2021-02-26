<template>
    <div class="fund-wrapper">
        <table class="fund-table">
            <thead>
                <tr>
                    <td>
                        Fund Name
                    </td>
                    <td>
                        Type
                    </td>
                    <td>
                        Inception Date
                    </td>
                    <td>
                        Description
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="fund in funds"
                    :value="fund.name"
                    :key="fund.id"
                    id="fund-row-wrapper"
                >
                    <td>
                        {{fund.name}}
                    </td>
                    <td>
                        {{fund.type}}
                    </td>
                    <td>
                        {{fund.inception_date}}
                    </td>
                    <td>
                        {{fund.description}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import lib from '../library';
    export default {
        props: {
            client: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                funds: [],
            }
        },
        mounted() {
            lib.func.fetchInvestmentTypes(this.client, true)
                .then(response => {
                    this.funds = response.investmentTypes;
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
    .fund-wrapper {
        display: flex;
        flex-direction: column;
    }
    .fund-table td{
        border: 1px grey solid;
    }
</style>
