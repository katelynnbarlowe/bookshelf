<template>
    <div class="container mt-24 border-2 border-color-grey">
        <filters :shelf-id="id" />
        <h1 class="text-center lowercase text-6xl -mt-8 font-serif">
            <span class="px-8 bg-tan">{{ title }}</span>
        </h1>
        <h3 class="text-xl text-center text-green mb-4" v-if="books.length">
            <span class="label">
                <span>{{ books.length }}</span>
                books.
            </span>
        </h3>
        <div class="flex flex-wrap">
            <book v-for="book in books" :key="book.id" :book="book" />
        </div>
    </div>
</template>

<script>
import Book from './Book.vue';
import Filters from './Filters.vue';
import store from '../store.js';
export default {
    props: ['title', 'id'],
    components: { Book, Filters },
    data() {
        return {
            store,
            books: [],
        };
    },
    mounted() {
        this.getBooks();
    },
    methods: {
        getBooks() {
            axios
                .get('/api/book', { params: { shelf_id: this.id } })
                .then((response) => {
                    this.books = JSON.parse(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
