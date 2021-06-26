require('./bootstrap');

require('slick-carousel');

window.Vue = require('vue');

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

            //piatti per carrello
            carrello: [],
            totalPrice: 0,
            productNumber: [],
            pezziTotali: 0,
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
                    })
                    .catch((error) => {
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


            //filtro per categorie
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
                            //console.log(element.nome_attivita);
                        }

                    }
                });

            },

            //filtro per nome
            searchRestaurant: function () {
                
                if (this.searchedRestaurantTxt.length > 0) {

                    this.filter = [];

                    axios.get('/api/get/all/restaurants')
                         .then(data => {
                             this.allRestaurants = data.data[0];
                             // console.log(this.allRestaurants);

                         }).catch((error) => {
                             console.log(error);
                         });

                    this.txtFilteredRestaurant = [];

                    for (let i = 0; i < this.allRestaurants.length; i++) {

                        const restaurant = this.allRestaurants[i];

                        const nomeSingoloRistorante = restaurant.nome_attivita;
                        //console.log(nomeSingoloRistorante);

                        if (nomeSingoloRistorante.toLowerCase().includes(this.searchedRestaurantTxt.toLowerCase())) {

                            this.txtFilteredRestaurant.push(restaurant);
                        }

                    }

                }


            },

            getDishId: function (dish) {

                let choosenDish = dish;

                if (this.carrello.length == 0) {
                    this.productNumber.push(choosenDish);
                    choosenDish.counter = 1;
                    this.totalPrice += (choosenDish.prezzo);
                    this.carrello.push(choosenDish);

                } else {


                    for (let i = 0; i <= this.carrello.length; i++) {

                        if (this.carrello[i].id == choosenDish.id) {
                            console.log('non pusho');
                            this.productNumber.push(choosenDish);
                            choosenDish.counter = 1;
                            this.totalPrice += (choosenDish.prezzo);

                            break;

                        } else if (i == this.carrello.length - 1) {


                            this.carrello.push(choosenDish);


                        }
                    }
                }
            },

            increase: function (dishId, index) {

                this.totalPrice += (this.carrello[index].prezzo);
                this.carrello[index].counter++;
                // }

                console.log('nuovo carrello:', this.carrello[index], 'total price:', this.totalPrice);
                console.log("");

            },

            //diminuisci quantità piatto
            decrease: function (dishId, index) {

                // console.log('diminuisci', dishId, index);
                console.log(this.carrello[index]);
                if (this.carrello[index].counter > 0) {
                    this.carrello[index].counter--;
                    this.totalPrice -= (this.carrello[index].prezzo);
                    let dish = {
                        id: dishId,
                    };
                    this.productNumber.splice(index, 1);
                    console.log('nuovo carrello:', this.carrello, 'total price:', this.totalPrice);

                }
                else if (this.carrello[index].counter < 1) {

                    this.carrello.splice(index, 1);
                    console.log(this.carrello, this.totalPrice);
                    console.log('nuovo carrello:', this.carrello, 'total price:', this.totalPrice);

                }

            },

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
