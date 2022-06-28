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
                    :class="{ 'bg-yellow': store.state === value }"
                    @click.prevent="store.updateState(value)"
                >
                    {{ label }}
                </button>
            </div>
            <div class="mt-3">
                <label for="katelynnRating" class="text-normal">katelynn's minimum rating</label>
                <div class="flex align-items-start">
                    <div class="range-field w-9/12">
                        <input
                            type="range"
                            class="form-range block h-6 border-0 bg-transparent appearance-none w-full "
                            min="0"
                            max="5"
                            step=".25"
                            id="katelynnRating"
                            v-model="katyRating"
                            @change="store.setKatyMinimumRating(katyRating)"
                        />
                    </div>
                    <div class="w-2/12">
                        <span class="pl-2">{{store.katyMinimumRating}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import FilterIcon from './svgs/Filter';
import store from '../store.js';
export default {
    components: { FilterIcon },
    data() {
        return {
            store,
            open: false,
            states: {
                all: 'All',
                read: 'Read',
                'to-read': 'To Read',
                abandoned: 'Abandoned',
            },
            katyRating: 0,
        };
    },
    watch: {
        'store.katyMinimumRating'(newVal, oldVal) {
            this.katyRating = newVal;
        }
    }
};
</script>
