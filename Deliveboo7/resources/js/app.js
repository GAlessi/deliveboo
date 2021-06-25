require('./bootstrap');

require('slick-carousel');

window.Vue = require('vue');

// const slick = require('slick-carousel');
// import'slick-carousel';

document.addEventListener("DOMContentLoaded", function () {

    new Vue({
        el: '#app',

        data: {

            //filtro ricerca checkbox input
            categories: [],
            restaurantsList: [],
            allRestaurants: [],
            category_restaurant: [],
            filter: [],

            //filtro ricerca text input
            searchedRestaurantTxt: "",
            filteredRestaurants: [],
            txtFilteredRestaurant: [],
        },
        mounted: function () {
            console.log('VUE Connected');
            this.getCategories();
            this.getAllRestaurants();
        },
        methods: {
            // Funzione di chiamata al controller Statistiche
            getCategories: function () {

                axios.get('/api/get/categories/')

                    .then(data => {

                        data.data.forEach(element => {
                            this.categories.push({
                                'id': element.id,
                                'nome': element.nome
                            });
                        });

                    }).catch((error) => {
                        console.log(error);
                    });
            },

            getAllRestaurants: function () {

                axios.get('/api/get/all/restaurants')
                    .then(data => {
                        this.restaurantsList = data.data[0];
                        this.category_restaurant = data.data[1];
                        this.giveGenres();
                    }).catch((error) => {
                        console.log(error);
                    });
            },
            giveGenres: function () {
                for (let i = 0; i < this.restaurantsList.length; i++) {
                    this.restaurantsList[i].categories = [];
                    for (let j = 0; j < this.category_restaurant[i].length; j++) {
                        this.restaurantsList[i].categories.push({
                            'id': this.category_restaurant[i][j].id,
                            'name': this.category_restaurant[i][j].nome
                        });
                    }
                }
            },


            getFilteredRestaurant: function () {
                this.filteredRestaurants = [];
                let arrayCategorie = [];

                for (var i = 0; i < this.restaurantsList.length; i++) {
                    arrayCategorie.push(this.restaurantsList[i].categories);
                }

                this.restaurantsList.forEach(element => {
                    let categorie = element.categories;
                    let categoriesID = [];
                    let filter = [];

                    for (var i = 0; i < this.filter.length; i++) {
                        filter.push(parseInt(this.filter[i]));
                    }

                    for (var i = 0; i < categorie.length; i++) {
                        categoriesID.push(categorie[i].id);
                        let checker = (arr, target) => target.every(v => arr.includes(v));

                        if (checker(categoriesID, filter) && !this.filteredRestaurants.includes(element)) {
                            this.filteredRestaurants.push(element);
                            console.log(element.nome_attivita);
                        }

                    }
                });

            },

            searchRestaurant: function(){
                // console.log(this.searchedRestaurantTxt);
                this.filter=[];

                axios.get('/api/get/all/restaurants',
                    {
                        params: {
                            // Parametri
                        }
                    }).then(data => {
                        this.allRestaurants = data.data[0];
                        // console.log(this.allRestaurants);

                    }).catch((error) => {
                        console.log(error);
                    });

                    this.txtFilteredRestaurant=[];
                for (let i = 0; i < this.allRestaurants.length; i++) {
                    const restaurant = this.allRestaurants[i];

                    const nomeSingoloRistorante = restaurant.nome_attivita;
                    //console.log(nomeSingoloRistorante);

                    if(nomeSingoloRistorante.toLowerCase().includes(this.searchedRestaurantTxt.toLowerCase())){

                        this.txtFilteredRestaurant.push(restaurant);
                    }

                }
            }

        }

    });


});

$(document).ready(() => {
    $('.autoplay').slick({
        // slidesToShow: 3,
        // slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 3500,
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
})
