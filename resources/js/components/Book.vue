<template>
    <div class="col-lg-2 col-md-4 book to-read romance young-adult">
        <div class="inner">
            <div class="img">
                <img :src="`/images/covers/${book.cover}`" v-if="book.cover">
                <div class="filler" v-else>
                    no image available
                </div>
                <template v-if="book.main_shelf === 'read'">
                    <div class="read">read</div>
                    <div class="rating" v-if="book.rating">
                        <star v-for="index in fullStars" :key="index" />
                        <star-half v-for="index in halfStars" :key="'H'+index" />
                        <star-empty v-for="index in emptyStars" :key="'E'+index" />
                    </div>
                </template>
            </div>
            <h4>{{ book.title }}</h4>
            by: {{ book.author_firstname }} {{ book.author_lastname }}
            <div class="meta">
                Ave. Rating: {{ round(book.average_rating,2) }}
                <div class="extra-meta">
                    Pages: {{ book.num_pages }}
                    <br>Year Published: 2013
                    <br>
                    <a :href="`https://www.goodreads.com/book/show/${book.goodreads_id}`" target="_blank">View on Goodreads</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Star from "./svgs/Star";
    import StarHalf from "./svgs/StarHalf";
    import StarEmpty from "./svgs/StarEmpty";
    export default {
        components: {StarEmpty, StarHalf, Star},
        props: {
            book: {
                type: Object,
                required: true,
            }
        },
        methods: {
            round(number, decimalPlaces){
                const factorOfTen = Math.pow(10, decimalPlaces)
                return Math.round(number * factorOfTen) / factorOfTen
            },
        },
        computed: {
            fullStars: function(){
                return Math.floor(this.book.rating);
            },
            halfStars: function(){
                return Math.ceil(this.book.rating) !== this.book.rating ? 1 : 0;
            },
            emptyStars: function(){
                return 5 - (this.fullStars + this.halfStars);
            }
        }
    }
</script>
