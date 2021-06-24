/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


 document.addEventListener("DOMContentLoaded", function() {

     new Vue({
         el: '#app',

         data: {
             categories: [],
             restaurantsList: [],
             category_restaurant: [],
             filteredRestaurants: [],
             filter: [],
             // categorieArray: ['1','2','3','4','5','6','7','8','9','10','11']
         },
         mounted: function(){
             console.log('VUE Connected');
             this.getCategories();
             this.getAllRestaurants();
         },
         methods:{
             // Funzione di chiamata al controller Statistiche
             getCategories: function(){

                 axios.get('/api/get/categories/',
                 {
                     params:{
                         // Parametri
                     }
                 }).then(data => {
                     // this.categories = data.data;

                     data.data.forEach(element => {
                         this.categories.push({
                             'id': element.id,
                             'nome': element.nome
                         });
                     });
                     console.log(this.categories);

                 }).catch((error) => {
                     console.log(error);
                 });
             },

             getAllRestaurants: function(){

                 axios.get('/api/get/all/restaurants',
                 {
                     params:{
                         // Parametri
                     }
                 }).then(data => {
                     this.restaurantsList = data.data[0];
                     this.category_restaurant = data.data[1];
                     // console.log("prova:1",this.restaurantsList);
                     // console.log("prova:2",this.category_restaurant);
                     this.giveGenres();
                 }).catch((error) => {
                     console.log(error);
                 });
             },
             giveGenres: function (){
                 for (let i = 0; i < this.restaurantsList.length; i++) {
                     // console.log(this.restaurantsList[i].id);
                     this.restaurantsList[i].categories = [];
                     for (let j = 0; j < this.category_restaurant[i].length; j++) {
                         // console.log(this.category_restaurant[i][j]);
                         this.restaurantsList[i].categories.push({
                             'id': this.category_restaurant[i][j].id,
                             'name': this.category_restaurant[i][j].nome
                         });
                         // console.log(this.restaurantsList[i].categories);
                     }
                 }
                 // console.log("prova3",this.restaurantsList);
             },

             // getFilteredRestaurant: function(){
             //     this.filteredRestaurants = [];
             //     console.log(this.filteredRestaurants, 'emptyyy');
             //     this.restaurantsList.forEach(element => {
             //         let push = false;
             //         // console.log( 'RISTORANTE'. element.id);
             //         element.categories
             //         .forEach(element => {
             //             console.log(element.name, element.id, 'CATEGORIA');
             //             console.log(this.filter , 'FILTRO');
             //             for (let i = 0; i < this.filter.length; i++) {
             //                 if(element.id == this.filter[i]){
             //                     push = true;
             //                 }
             //             }
             //         });
             //         if (push) {
             //             this.filteredRestaurants.push(element);
             //             console.log(element.nome_attivita,'PUSHATOOOO');
             //         }else{
             //             console.log('NOOOOOOOOOOOOOOOOOOOOOOO');
             //         }
             //     });
             //
             // }


             getFilteredRestaurant: function(){
                 this.filteredRestaurants = [];
                 let arrayCategorie=[];
                 // let categorieID = [];

                 for (var i = 0; i < this.restaurantsList.length; i++) {
                     arrayCategorie.push(this.restaurantsList[i].categories);
                 }

                 // console.log(arrayCategorie);
                 // console.log(this.filteredRestaurants);
                 // console.log(this.filteredRestaurants, 'emptyyy');

                this.restaurantsList.forEach(element => {
                    let push = false;
                    let categorie = element.categories;
                    // categoriesID = [];

                    console.log("categorie ristorante:", categorie);
                    console.log("categorie selezionate:", this.filter);
                    console.log("");


                    // if(this.selectedTags.length == 0) return this.cards;

                    var ristorantiFiltrati = [];
                    var filters = this.filter;

                    categorie.forEach(function(categoria) {

                        function cardContainsFilter(filter) {
                            return categoria.id.indexOf(filter) != -1;
                        }

                        if(filters.every(cardContainsFilter)) {
                            ristorantiFiltrati.push(categoria);
                        }
                    });
                    console.log(ristorantiFiltrati);
