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
        fetchInvestmentTypes (clientid) {
            return axios.get('/api/investment-types/' + clientid)
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
