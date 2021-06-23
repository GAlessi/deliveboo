<template>
    <div class="container">
        <div class="row justify-content-center py-2">
            <div class="col-md-8">
                <div class="card">

                    <div>
                        componente vue
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {

            return {

                tipologia: '',
            }
        },

        props:{

            type: Object
        },

        mounted() {

            axios.get('/api/filterRestaurant', {
                
            })
            .then(res => console.log('res'))
            .catch(err => console.log('err'))


            console.log('Component mounted.', this.type, this.tipologia)
        },

    }
</script>
