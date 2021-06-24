require('./bootstrap');

window.Vue = require('vue');

document.addEventListener("DOMContentLoaded", function () {

    new Vue({
        el: '#app',

        data: {
            categories: [],
            restaurantsList: [],
            category_restaurant: [],
            filteredRestaurants: [],
            filter: [],

        },
        mounted: function () {
            console.log('VUE Connected');
            this.getCategories();
            this.getAllRestaurants();
        },
        methods: {
            // Funzione di chiamata al controller Statistiche
            getCategories: function () {

                axios.get('/api/get/categories/',
                    {
                        params: {
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

            getAllRestaurants: function () {

                axios.get('/api/get/all/restaurants',
                    {
                        params: {
                            // Parametri
                        }
                    }).then(data => {
                        this.restaurantsList = data.data[0];
                        this.category_restaurant = data.data[1];
                        this.giveGenres();
                    }).catch((error) => {
                        console.log(error);
                    });
            },
            giveGenres: function () {
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


            getFilteredRestaurant: function () {
                this.filteredRestaurants = [];
                let arrayCategorie = [];

                for (var i = 0; i < this.restaurantsList.length; i++) {
                    arrayCategorie.push(this.restaurantsList[i].categories);
                }

                this.restaurantsList.forEach(element => {
                    let push = false;
                    let categorie = element.categories;
                    let categoriesID = [];
                    let filter = [];

                    for (var i = 0; i < this.filter.length; i++) {
                        filter.push(parseInt(this.filter[i]));
                    }

                    for (var i = 0; i < categorie.length; i++) {
                        categoriesID.push(categorie[i].id);
                        let checker = (arr, target) => target.every(v => arr.includes(v));

                        if (checker(categoriesID, filter)) {
                            let push = true;
                            if (push) {
                                this.filteredRestaurants.push(element);
                                console.log(element.nome_attivita);
                            } else {
                                console.log('errore');
                            }
                        }

                    }
                });

            }

        }

    });


    // $('.autoplay').slick( {
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     autoplaySpeed: 3500,
    // });
});