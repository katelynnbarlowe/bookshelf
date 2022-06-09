<template>
    <div class="col-lg-2 col-md-4 book to-read romance young-adult">
        <div class="inner">
            <div class="img">
                <img src="/images/covers/1250042615-M.jpg">
            </div>
            <h4>Fangirl</h4>
            by: Rainbow Rowell
            <div class="meta">
                Ave. Rating: 4.01
                <div class="extra-meta">
                    Pages: 483
                    <br>Year Published: 2013
                    <br>
                    <a href="https://www.goodreads.com/book/show/16068905" target="_blank">View on Goodreads</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
