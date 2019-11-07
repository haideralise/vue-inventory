<template>
    <div>
        <modal-window ref="imagemodal">
            <image-carousel :images="images"></image-carousel>
        </modal-window>
        <header-image @header-clicked="openModal" :image-url="images[0]"></header-image>
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
            <feature-list title="Amenities" :items="amenities">
                <template slot-scope="amenity">
                    <i class="fa fa-lg" :class="amenity.icon"></i>
                    <span>{{ amenity.title }}</span> </template>
            </feature-list>
                <feature-list title="Prices" :items="prices">
                    <template slot-scope="price">
                        {{price.title }}:<strong>{{ price.value }}</strong>
                    </template>
                </feature-list>
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
        methods : {
          openModal(){
              this.$refs.imagemodal.modalOpen = true ;
          }
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
