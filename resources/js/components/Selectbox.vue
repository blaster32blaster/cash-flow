<template>
    <div :id=id>
        <select
            v-model="selected"
            :disabled="disable"
        >
            <option :value="null" disabled>{{ placeholder }}</option>
            <option
                v-for="item in myFilter(values)"
                :value="item"
                :key="item[arraykey]"
             >
                <value
                    :entry="item"
                    :arraykey="arraykey"
                >
                </value>
            </option>
        </select>
    </div>
</template>
<script>
    import Value from './Value';
    export default {
        name: 'select-box',
        components: {
            Value
        },
        props: {
            id : {
                type: String,
                default: ''
            },
            placeholder: {
                type: String,
                default: ''
            },
            values: {
                type: Array,
                default: () => []
            },
            arraykey: {
                type: String,
                default: ''
            },
            statekey: {
                type: String,
                default: ''
            },
            disable: {
                type: Boolean,
                default: true
            }
        },
        data() {
            return {
                selected: null,
            }
        },
        methods: {
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
            myFilter (values) {
                const arrayUniqueByKey = [...new Map(values.map(item =>
                    [item[this.arraykey], item])).values()];
                return arrayUniqueByKey;
            }
        },
        watch: {
            selected : function (value) {
                if (this.selected) {
                    this.updateGlobalState(this.statekey, this.selected);
                    this.$emit(this.statekey + 'selected');
                }
            }
        }
    }
</script>
<style scoped>
    #cash-main-div {
        display: flex;
        flex-direction: column;
    }
</style>
