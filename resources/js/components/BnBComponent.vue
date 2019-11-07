<template>
    <div>
        <div id="modal" v-bind:class="{ show : modalOpen}">
            <button v-on:click="modalOpen = false" class="modal-close">
                &times;
            </button>
            <image-carousel :images="images"></image-carousel>
        </div>
        <div class="header">
            <div class="header-img" v-bind:style="headerImageStyle" v-on:click="modalOpen = true">
                <button class="view-photos">View Photos</button>
            </div>
        </div>
        <div class="container">
            <div class="heading"><h1>{{ title }}</h1>
                <p>{{ address }}</p></div>
            <hr>
            <div class="about">
                <h3>About this listing</h3>
                <p v-bind:class="{ contracted: contracted }">{{ about }}</p>
                <button class="more" v-on:click="contracted = !contracted">+ More</button>
            </div>
            <div class="lists">
                <hr>
                <div class="amenities list">
                    <div class="title">
                        <strong>Amenities</strong>
                    </div>
                    <div class="content">
                        <div class="list-item"
                             v-for="amenity in amenities">
                            <i class="fa fa-lg" v-bind:class="amenity.icon"></i>
                            <span>{{ amenity.title }}</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="prices list">
                    <div class="title"><strong>Prices</strong></div>
                    <div class="content">
                        <div class="list-item" v-for="price in prices"> {{
                            price.title }}: <strong>{{ price.value }}</strong></div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</template>

<script>
    import { populateAmenitiesAndPrices } from '../helpers';

    export default {
        data () {
            return populateAmenitiesAndPrices(JSON.parse(window.vuebnb_listing_model));
        },
        mounted() {
            console.log('Component mounted.')
        },
        /*watch() {
            modalOpen: function (newVal, oldVal) {
                var className = 'modal-open';
                if(newVal) {
                    document.body.classList.remove(className);
                }else {
                    document.body.classList.add(className);
                }
            }
        },*/
        escapeEventLister(evt) {
            if (evt.keyCode === 27 && this.modalOpen) {
                this.modalOpen = false;
            }
        },
        created() {
            document.addEventListener('keyup',  this.escapeEventLister);
        },
        destroy(){
            document.removeEventListener('keyup',  this.escapeEventLister);
        }


    }
</script>
