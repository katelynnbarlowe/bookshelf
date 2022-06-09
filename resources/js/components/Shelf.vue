<template>
    <div class="container shelf-wrap">
        <h1 class="text-center"><span>{{ title }}</span></h1>
        <h3 class="text-center"><span class="label"><span id="bookCount">100</span> books.</span></h3>
        <div class="row">
            <book />
        </div>
    </div>
</template>

<script>
    import Book from "./Book.vue";
    export default {
        props: [ 'title' ],
        components: { Book },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
