export default {
    func: {
        fetchClients () {
            return axios.get('/api/clients')
                .then((response) => {
                    return {
                        clients: response.data
                    }
                })
                    .catch(error => {
                        console.log('fetching clients error')
                    });
        },
        fetchCashFlow (investmentId) {
            return axios.get('/api/cash-flow/' + investmentId)
            .then((response) => {
                return {
                    cashFlow: response.data
                }
            })
                .catch(error => {
                    console.log('fetching cash flow error')
                });
        },
        updateCashFlow (cashFlowId, theReturn) {
            axios.put('/api/cash-flow/' + cashFlowId, {
                theReturn: theReturn
            })
            .then((response) => {
                return {
                    cashFlow: response.data
                }
            })
                .catch(error => {
                    console.log('updating cash flow error')
                });
        },
        fetchInvestmentTypes (clientid, obfuscated) {
            let url = '/api/investment-types/' + clientid
            if (obfuscated) {
                url = url + '?obfuscated=true'
            }
            return axios.get(url)
            .then((response) => {
                return {
                    investmentTypes: response.data
                }
            })
                .catch(error => {
                    console.log('fetching clients error')
                });
        },
        fetchInvestmentNames (clientid) {
            return axios.get('/api/investment-names/' + clientid)
            .then((response) => {
                return {
                    investmentNames: response.data
                }
            })
                .catch(error => {
                    console.log('fetching clients error')
                });
        }
    },
}
