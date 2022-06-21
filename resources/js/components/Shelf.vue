<template>
    <div class="container shelf-wrap">
        <h1 class="text-center"><span>{{ title }}</span></h1>
        <h3 class="text-center"><span class="label"><span id="bookCount">100</span> books.</span></h3>
        <div class="row">
            <book v-for="book in this.books" :key="book.isbn" :book="book" />
        </div>
    </div>
</template>

<script>
    import Book from "./Book.vue";
    export default {
        props: [ 'title', 'id' ],
        components: { Book },
        data() {
            return {
                books: {}
            }
        },
        mounted() {
            this.getBooks();
        },
        methods: {
            getBooks() {
                axios.get('/api/book',{ params: { shelf_id: this.id }}).then(response => {
                    this.books = JSON.parse(response.data);
                }).catch(error => {
                    console.log(error);
                })
            }
        }
    }
</script>
