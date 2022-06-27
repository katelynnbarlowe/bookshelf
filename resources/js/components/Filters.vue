<template>
    <div class="filters fixed top-3 left-3 z-10">
        <a href="#" @click.prevent="open = !open" class="hover:text-green">
            <filter-icon class="w-5" />
        </a>
        <div class="filters-content mt-6 bg-purple border-l-2 border-grey p-6" v-if="open">
            <div class="btn-group border-2 border-grey rounded-3xl">
                <button
                    type="button"
                    class="btn uppercase text-sm text-center outline-0 font-normal leading-6 py-1.5 px-3"
                    v-for="(label, value) in states"
                    :class="{ 'bg-yellow': currentState === value }"
                    @click.prevent="currentState = value"
                >
                    {{ label }}
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import FilterIcon from './svgs/Filter';
export default {
    components: { FilterIcon },
    data() {
        return {
            open: false,
            states: {
                all: 'All',
                read: 'Read',
                'to-read': 'To Read',
                abandoned: 'Abandoned',
            },
            currentState: 'all',
        };
    },
    watch: {
        currentState() {

        }
    }
};
</script>
