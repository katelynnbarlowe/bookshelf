<template>
    <Component :is="as" class="italic text-4xl font-serif">
        <slot />
    </Component>
</template>
<script>
export default {
    props: {
        as: {
            default: 'h1'
        }
    }
}
</script>
