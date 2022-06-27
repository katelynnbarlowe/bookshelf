<template>
    <div class="book w-1/6 p-1 flex cursor-pointer group">
        <div class="inner bg-white bg-opacity-60 flex-shrink-0 p-4 w-full">
            <div class="img relative overflow-hidden p-1">
                <img :src="`/images/covers/${book.cover}`" v-if="book.cover" />
                <div class="filler bg-pink w-full h-72 flex items-center justify-center text-xs opacity-80" v-else>
                    no image available
                </div>
                <template v-if="book.main_shelf === 'read'">
                    <div
                        class="read bg-orange px-8 py-2 text-white uppercase text-xs text-center absolute top-1.5 -right-6 rotate-45"
                    >
                        read
                    </div>
                    <div class="rating absolute bg-black bg-opacity-40 text-center" v-if="book.rating">
                        <!-- prettier-ignore -->
                        <star v-for="index in fullStars" :key="index" />
                        <star-half v-for="index in halfStars" :key="'H' + index" />
                        <star-empty v-for="index in emptyStars" :key="'E' + index" />
                    </div>
                </template>
            </div>
            <h4 class="text-md uppercase font-medium">{{ book.title }}</h4>
            by: {{ book.author_firstname }} {{ book.author_lastname }}
            <div class="meta text-xs pt-2">
                Ave. Rating: {{ round(book.average_rating, 2) }}
                <div class="extra-meta hidden group-hover:block">
                    Pages: {{ book.num_pages }}
                    <br />
                    Year Published: 2013
                    <br />
                    <a
                        :href="`https://www.goodreads.com/book/show/${book.goodreads_id}`"
                        target="_blank"
                        class="underline"
                    >
                        View on Goodreads
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Star from './svgs/Star';
import StarHalf from './svgs/StarHalf';
import StarEmpty from './svgs/StarEmpty';
export default {
    components: { StarEmpty, StarHalf, Star },
    props: {
        book: {
            type: Object,
            required: true,
        },
    },
    methods: {
        round(number, decimalPlaces) {
            const factorOfTen = Math.pow(10, decimalPlaces);
            return Math.round(number * factorOfTen) / factorOfTen;
        },
    },
    computed: {
        fullStars: function () {
            return Math.floor(this.book.rating);
        },
        halfStars: function () {
            return Math.ceil(this.book.rating) !== this.book.rating ? 1 : 0;
        },
        emptyStars: function () {
            return 5 - (this.fullStars + this.halfStars);
        },
    },
};
</script>
