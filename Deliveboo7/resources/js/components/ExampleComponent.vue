<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="text-left d-sm-flex flex-sm-wrap flex-md-column align-items-start align-self-start mt-md-5">

                     <!-- stampo a schermo le tipologie per permettere all'utente di fare le ricerche -->
                     <label class="check" v-for="types in type">
                       <input  type="checkbox"
                             :value="type.nome"
                             v-model="filters"
                             @change="searchRestaurants()"
                       >
                       <span class="nome-search">{{ type.nome }}</span>
                     </label>
                </div>
            </div>
        </div>

        <!-- stampo i ristoranti appartenenti alla categoria selezionata dall'utente -->
               <div class="col-sm-12 col-md-10 d-flex flex-wrap align-items-start mt-md-5 mx-auto">

                   <div
                       v-for="users in user"
                       :key="user.id"
                       class="user"
                   >

                       <a :href="'/showRestaurant/' + user.id">
                           <div class="p-3 testo-user">
                               <h4>
                                   <strong>
                                       {{ user.nome_attivita }}
                                   </strong>
                               </h4>
                               <span>

                                   {{user.via}} <br>
                                   Tel: {{user.email}}
                               </span>
                           </div>
                       </a>

                   </div>

               </div>
    </div>
</template>

<script>
export default {
    props: {
        types: Array
    },
    data() {
        return {
            users: [],
            filters: [],
        };
    },
    methods: {
        // funzione per cercare i ristoranti in base alla tipologia selezionata dall'utente
        searchRestaurants: function() {

          axios.post('/search', {
            filters: this.filters,
          })

          .then(r => {
            this.users = r.data;
          })
          .catch(e => console.log("error", e));

          console.log(this.users, this.filters);
        },
    },
    
    mounted() {
      this.searchRestaurants();

    }
};
</script>
