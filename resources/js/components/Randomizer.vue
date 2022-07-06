<template>
    <container>
        <Heading class="mt-24 mb-3">choose my next read</Heading>
        <div class="inner border-2 border-color-grey p-6">
            <label class="text-lg font-normal">included shelves</label>
            <div class="flex flex-wrap gap-x-1 -ml-2">
                <label
                    :for="`shelf${shelf.id}`"
                    class="lowercase px-2 hover:bg-yellow cursor-pointer"
                    :class="{ 'bg-yellow': selectedShelves.includes(shelf.id) }"
                    v-for="shelf in shelves"
                    :key="shelf.id"
                >
                    <input
                        type="checkbox"
                        :id="`shelf${shelf.id}`"
                        :value="shelf.id"
                        v-model="selectedShelves"
                        class="sr-only"
                    />
                    {{ shelf.name }}
                </label>
            </div>
        </div>
    </container>
</template>
<script>
import Container from './Container';
import Heading from './Heading';

export default {
    components: { Heading, Container },
    data() {
        return {
            selectedShelves: [],
        };
    },
    props: {
        shelves: {
            required: true,
            type: Array,
        },
    },
};
</script>
